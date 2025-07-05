<?php
/**
 * اختبار سريع لقاعدة البيانات
 * Quick Database Test
 */

echo "=== SAIEB Services - Quick Database Test ===\n";
echo "اختبار سريع لقاعدة البيانات\n\n";

// تضمين ملف إعدادات قاعدة البيانات
require_once 'config/database.php';

try {
    // اختبار الاتصال
    if ($conn && !$conn->connect_error) {
        echo "✅ الاتصال: نجح\n";
        
        // معلومات الاتصال
        $config = $dbConfig->getConfig();
        echo "📊 البيئة: " . $config['environment'] . "\n";
        echo "🖥️  الخادم: " . $config['host'] . ":" . $config['port'] . "\n";
        echo "🗄️  قاعدة البيانات: " . $config['database'] . "\n";
        echo "👤 المستخدم: " . $config['username'] . "\n";
        
        // اختبار إصدار MySQL
        $result = $conn->query("SELECT VERSION() as version");
        if ($result && $row = $result->fetch_assoc()) {
            echo "🔢 إصدار MySQL: " . $row['version'] . "\n";
        }
        
        // اختبار الجداول
        $result = $conn->query("SHOW TABLES");
        if ($result) {
            $tableCount = $result->num_rows;
            echo "📋 عدد الجداول: " . $tableCount . "\n";
            
            if ($tableCount > 0) {
                echo "\n📝 الجداول الموجودة:\n";
                while ($row = $result->fetch_array()) {
                    $tableName = $row[0];
                    
                    // عدد السجلات في كل جدول
                    $countResult = $conn->query("SELECT COUNT(*) as count FROM `$tableName`");
                    $count = $countResult ? $countResult->fetch_assoc()['count'] : 0;
                    
                    echo "   - $tableName ($count سجل)\n";
                }
            }
        }
        
        // اختبار جدول محدد
        $testTable = $prefix . "about";
        $result = $conn->query("SHOW TABLES LIKE '$testTable'");
        if ($result && $result->num_rows > 0) {
            echo "\n✅ جدول الاختبار ($testTable): موجود\n";
            
            // اختبار البيانات
            $result = $conn->query("SELECT COUNT(*) as count FROM `$testTable`");
            if ($result && $row = $result->fetch_assoc()) {
                echo "📊 عدد السجلات: " . $row['count'] . "\n";
            }
        } else {
            echo "\n❌ جدول الاختبار ($testTable): غير موجود\n";
            echo "💡 تحتاج لاستيراد ملف SQL: 27_11_2024.sql\n";
        }
        
        echo "\n🎉 الاختبار مكتمل بنجاح!\n";
        echo "🌐 يمكنك الآن زيارة: http://localhost/your-project/\n";
        
    } else {
        throw new Exception($conn->connect_error ?? 'خطأ غير محدد');
    }
    
} catch (Exception $e) {
    echo "❌ فشل الاتصال: " . $e->getMessage() . "\n";
    echo "\n🔧 حلول مقترحة:\n";
    echo "1. تأكد من تشغيل XAMPP\n";
    echo "2. تحقق من أن MySQL يعمل على المنفذ الصحيح\n";
    echo "3. أنشئ قاعدة البيانات إذا لزم الأمر\n";
    echo "4. استورد ملف SQL\n";
    echo "\n📖 للمساعدة: زر setup-local-db.php\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "© 2024 SAIEB Services\n";
?>