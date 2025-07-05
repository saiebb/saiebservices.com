<?php
/**
 * إنشاء قاعدة البيانات - SAIEB Services
 * Database Creation Script
 */

echo "=== إنشاء قاعدة البيانات ===\n";
echo "Creating SAIEB Services Database\n\n";

try {
    // الاتصال بدون تحديد قاعدة بيانات
    $conn = new mysqli('localhost', 'root', '', '', 3307);
    
    if ($conn->connect_error) {
        throw new Exception("فشل الاتصال: " . $conn->connect_error);
    }
    
    echo "✓ تم الاتصال بالخادم بنجاح\n";
    
    // تعيين الترميز
    $conn->set_charset('utf8mb4');
    
    // إنشاء قاعدة البيانات
    $sql = "CREATE DATABASE IF NOT EXISTS saiebservices CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    
    if ($conn->query($sql) === TRUE) {
        echo "✓ تم إنشاء قاعدة البيانات 'saiebservices' بنجاح\n";
    } else {
        throw new Exception("خطأ في إنشاء قاعدة البيانات: " . $conn->error);
    }
    
    // التحقق من وجود قاعدة البيانات
    $result = $conn->query("SHOW DATABASES LIKE 'saiebservices'");
    if ($result->num_rows > 0) {
        echo "✓ تم التحقق من وجود قاعدة البيانات\n";
    }
    
    // اختبار الاتصال بقاعدة البيانات الجديدة
    $conn->select_db('saiebservices');
    echo "✓ تم الاتصال بقاعدة البيانات بنجاح\n";
    
    // إنشاء جدول اختبار
    $testTable = "CREATE TABLE IF NOT EXISTS sa_test (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    if ($conn->query($testTable) === TRUE) {
        echo "✓ تم إنشاء جدول الاختبار\n";
    }
    
    // إدراج بيانات اختبار
    $insertTest = "INSERT INTO sa_test (name) VALUES ('SAIEB Services Test') ON DUPLICATE KEY UPDATE name=name";
    if ($conn->query($insertTest) === TRUE) {
        echo "✓ تم إدراج بيانات الاختبار\n";
    }
    
    // قراءة البيانات
    $result = $conn->query("SELECT * FROM sa_test LIMIT 1");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "✓ تم قراءة البيانات: " . $row['name'] . "\n";
    }
    
    $conn->close();
    
    echo "\n🎉 تم إعداد قاعدة البيانات بنجاح!\n";
    echo "Database setup completed successfully!\n";
    
} catch (Exception $e) {
    echo "❌ خطأ: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "© 2024 SAIEB Services - Database Setup\n";
?>