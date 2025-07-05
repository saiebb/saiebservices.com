<?php
/**
 * استيراد قاعدة البيانات المحسن - SAIEB Services
 * Enhanced Database Import Script
 */

echo "=== استيراد قاعدة البيانات المحسن ===\n";
echo "Enhanced SAIEB Services Database Import\n\n";

$sqlFile = 'localhost.sql';

if (!file_exists($sqlFile)) {
    echo "❌ ملف SQL غير موجود: $sqlFile\n";
    exit(1);
}

try {
    // الاتصال بالخادم أولاً (بدون تحديد قاعدة بيانات)
    $conn = new mysqli('localhost', 'root', '', '', 3307);
    
    if ($conn->connect_error) {
        throw new Exception("فشل الاتصال: " . $conn->connect_error);
    }
    
    echo "✓ تم الاتصال بالخادم بنجاح\n";
    
    // حذف قاعدة البيانات الحالية وإعادة إنشائها
    echo "🗑️ حذف قاعدة البيانات الحالية...\n";
    $conn->query("DROP DATABASE IF EXISTS saiebservices");
    
    echo "🆕 إنشاء قاعدة بيانات جديدة...\n";
    if (!$conn->query("CREATE DATABASE saiebservices CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
        throw new Exception("فشل في إنشاء قاعدة البيانات: " . $conn->error);
    }
    
    // الاتصال بقاعدة البيانات الجديدة
    $conn->select_db('saiebservices');
    echo "✓ تم الاتصال بقاعدة البيانات الجديدة\n";
    
    // تعيين الترميز
    $conn->set_charset('utf8mb4');
    
    // قراءة ملف SQL
    echo "📖 قراءة ملف SQL...\n";
    $sql = file_get_contents($sqlFile);
    
    if ($sql === false) {
        throw new Exception("فشل في قراءة ملف SQL");
    }
    
    echo "✓ تم قراءة الملف بنجاح (" . number_format(strlen($sql)) . " حرف)\n";
    
    // تنظيف وتحضير الاستعلامات
    echo "🧹 تنظيف وتحضير الاستعلامات...\n";
    
    // إزالة أوامر إنشاء قاعدة البيانات
    $sql = preg_replace('/CREATE DATABASE.*?;/i', '', $sql);
    $sql = preg_replace('/USE `.*?`;/i', '', $sql);
    
    // تقسيم الملف إلى أسطر
    $lines = explode("\n", $sql);
    $cleanedLines = [];
    $inMultiLineComment = false;
    
    foreach ($lines as $line) {
        $originalLine = $line;
        $line = trim($line);
        
        // التحقق من التعليقات متعددة الأسطر
        if (strpos($line, '/*') !== false) {
            $inMultiLineComment = true;
        }
        if (strpos($line, '*/') !== false) {
            $inMultiLineComment = false;
            continue;
        }
        if ($inMultiLineComment) {
            continue;
        }
        
        // تجاهل الأسطر الفارغة والتعليقات
        if (empty($line) || 
            strpos($line, '--') === 0 || 
            strpos($line, '/*!') === 0) {
            continue;
        }
        
        $cleanedLines[] = $originalLine;
    }
    
    // إعادة تجميع SQL
    $cleanSQL = implode("\n", $cleanedLines);
    
    echo "🔄 تنفيذ الاستعلامات باستخدام multi_query...\n";
    
    // تنفيذ الاستعلامات المتعددة
    if ($conn->multi_query($cleanSQL)) {
        $successCount = 0;
        $errorCount = 0;
        
        do {
            // الحصول على النتيجة إذا كانت موجودة
            if ($result = $conn->store_result()) {
                $result->free();
            }
            
            // التحقق من وجود أخطاء
            if ($conn->error) {
                $errorCount++;
                echo "  ⚠️ خطأ: " . $conn->error . "\n";
            } else {
                $successCount++;
                
                // عرض التقدم كل 10 استعلامات
                if ($successCount % 10 == 0) {
                    echo "  ✓ تم تنفيذ $successCount استعلام\n";
                }
            }
            
        } while ($conn->more_results() && $conn->next_result());
        
        // التحقق من الأخطاء النهائية
        if ($conn->error) {
            echo "  ⚠️ خطأ نهائي: " . $conn->error . "\n";
            $errorCount++;
        }
        
    } else {
        throw new Exception("فشل في تنفيذ الاستعلامات: " . $conn->error);
    }
    
    echo "\n📊 ملخص الاستيراد:\n";
    echo "✅ استعلامات نجحت: $successCount\n";
    echo "❌ استعلامات فشلت: $errorCount\n";
    
    // التحقق من الجداول المستوردة
    echo "\n🗄️ الجداول الموجودة:\n";
    $result = $conn->query("SHOW TABLES");
    $tableCount = 0;
    
    if ($result) {
        while ($row = $result->fetch_array()) {
            $tableName = $row[0];
            $countResult = $conn->query("SELECT COUNT(*) as count FROM `$tableName`");
            if ($countResult) {
                $count = $countResult->fetch_assoc()['count'];
                echo "  📋 $tableName ($count سجل)\n";
                $tableCount++;
            }
        }
    }
    
    echo "\n🎉 تم استيراد قاعدة البيانات بنجاح!\n";
    echo "📊 إجمالي الجداول: $tableCount\n";
    
    $conn->close();
    
} catch (Exception $e) {
    echo "❌ خطأ: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "© 2024 SAIEB Services - Enhanced Database Import\n";
?>