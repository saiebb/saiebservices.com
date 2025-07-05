<?php
/**
 * استيراد قاعدة البيانات - SAIEB Services
 * Database Import Script
 */

echo "=== استيراد قاعدة البيانات ===\n";
echo "Importing SAIEB Services Database\n\n";

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
    
    // تقسيم الملف إلى أسطر
    $lines = explode("\n", $sql);
    $cleanedLines = [];
    
    foreach ($lines as $line) {
        $line = trim($line);
            // تجاهل الأسطر الفارغة والتعليقات
        if (empty($line) || 
            strpos($line, '--') === 0 || 
            strpos($line, '/*') === 0 ||
            strpos($line, '*/') !== false ||
            strpos($line, 'CREATE DATABASE') !== false ||
            strpos($line, 'USE `') !== false) {
            continue;
        }
        
        $cleanedLines[] = $line;
    }
    
    // إعادة تجميع SQL
    $cleanSQL = implode("\n", $cleanedLines);
    
    
    echo "🔄 تنفيذ الاستعلامات...\n";
    
    // تقسيم الاستعلامات
    $queries = explode(';', $cleanSQL);
    $successCount = 0;
    $errorCount = 0;
    
    foreach ($queries as $query) {
        $query = trim($query);
        
        // تجاهل الاستعلامات الفارغة
        if (empty($query)) {
            continue;
        }
        
        try {
            if ($conn->query($query) === TRUE) {
                $successCount++;
                
                // عرض تقدم كل 5 استعلامات
                if ($successCount % 5 == 0) {
                    echo "  ✓ تم تنفيذ $successCount استعلام\n";
                }
            } else {
                $errorCount++;
                echo "  ⚠️ خطأ: " . $conn->error . "\n";
                echo "  الاستعلام: " . substr($query, 0, 100) . "...\n";
            }
        } catch (Exception $e) {
            $errorCount++;
            echo "  ❌ استثناء: " . $e->getMessage() . "\n";
        }
    }
    
    echo "\n📊 ملخص الاستيراد:\n";
    echo "✅ استعلامات نجحت: $successCount\n";
    echo "❌ استعلامات فشلت: $errorCount\n";
    
    // التحقق من الجداول المستوردة
    echo "\n🗄️ الجداول الموجودة:\n";
    $result = $conn->query("SHOW TABLES");
    $tableCount = 0;
    
    while ($row = $result->fetch_array()) {
        $tableName = $row[0];
        $countResult = $conn->query("SELECT COUNT(*) as count FROM `$tableName`");
        $count = $countResult->fetch_assoc()['count'];
        echo "  📋 $tableName ($count سجل)\n";
        $tableCount++;
    }
    
    echo "\n🎉 تم استيراد قاعدة البيانات بنجاح!\n";
    echo "📊 إجمالي الجداول: $tableCount\n";
    
    $conn->close();
    
} catch (Exception $e) {
    echo "❌ خطأ: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "© 2024 SAIEB Services - Database Import\n";
?>