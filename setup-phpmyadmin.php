<?php
/**
 * إعداد phpMyAdmin - إنشاء مستخدم pma وقاعدة البيانات
 * Setup phpMyAdmin - Create pma user and database
 */

echo "=== إعداد phpMyAdmin ===\n";
echo "Setting up phpMyAdmin Configuration\n\n";

try {
    // الاتصال بالخادم
    $conn = new mysqli('localhost', 'root', '', '', 3307);
    
    if ($conn->connect_error) {
        throw new Exception("فشل الاتصال: " . $conn->connect_error);
    }
    
    echo "✓ تم الاتصال بالخادم بنجاح\n";
    
    // إنشاء قاعدة بيانات phpmyadmin
    echo "🗄️ إنشاء قاعدة بيانات phpmyadmin...\n";
    $conn->query("CREATE DATABASE IF NOT EXISTS phpmyadmin CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    
    // إنشاء مستخدم pma
    echo "👤 إنشاء مستخدم pma...\n";
    $conn->query("DROP USER IF EXISTS 'pma'@'localhost'");
    $conn->query("CREATE USER 'pma'@'localhost' IDENTIFIED BY ''");
    $conn->query("GRANT SELECT, INSERT, UPDATE, DELETE ON phpmyadmin.* TO 'pma'@'localhost'");
    $conn->query("FLUSH PRIVILEGES");
    
    // تحديد قاعدة البيانات
    $conn->select_db('phpmyadmin');
    
    // إنشاء الجداول المطلوبة لـ phpMyAdmin
    echo "📋 إنشاء جداول phpMyAdmin...\n";
    
    $tables = [
        "CREATE TABLE IF NOT EXISTS `pma__bookmark` (
            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
            `dbase` varchar(255) NOT NULL DEFAULT '',
            `user` varchar(255) NOT NULL DEFAULT '',
            `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
            `query` text NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        
        "CREATE TABLE IF NOT EXISTS `pma__relation` (
            `master_db` varchar(64) NOT NULL DEFAULT '',
            `master_table` varchar(64) NOT NULL DEFAULT '',
            `master_field` varchar(64) NOT NULL DEFAULT '',
            `foreign_db` varchar(64) NOT NULL DEFAULT '',
            `foreign_table` varchar(64) NOT NULL DEFAULT '',
            `foreign_field` varchar(64) NOT NULL DEFAULT '',
            PRIMARY KEY (`master_db`,`master_table`,`master_field`),
            KEY `foreign_field` (`foreign_db`,`foreign_table`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        
        "CREATE TABLE IF NOT EXISTS `pma__table_info` (
            `db_name` varchar(64) NOT NULL DEFAULT '',
            `table_name` varchar(64) NOT NULL DEFAULT '',
            `display_field` varchar(64) NOT NULL DEFAULT '',
            PRIMARY KEY (`db_name`,`table_name`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        
        "CREATE TABLE IF NOT EXISTS `pma__history` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `username` varchar(64) NOT NULL DEFAULT '',
            `db` varchar(64) NOT NULL DEFAULT '',
            `table` varchar(64) NOT NULL DEFAULT '',
            `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
            `sqlquery` text NOT NULL,
            PRIMARY KEY (`id`),
            KEY `username` (`username`,`db`,`table`,`timevalue`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        
        "CREATE TABLE IF NOT EXISTS `pma__recent` (
            `username` varchar(64) NOT NULL,
            `tables` text NOT NULL,
            PRIMARY KEY (`username`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
        
        "CREATE TABLE IF NOT EXISTS `pma__favorite` (
            `username` varchar(64) NOT NULL,
            `tables` text NOT NULL,
            PRIMARY KEY (`username`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
    ];
    
    foreach ($tables as $sql) {
        if (!$conn->query($sql)) {
            echo "  ⚠️ خطأ في إنشاء جدول: " . $conn->error . "\n";
        }
    }
    
    echo "✅ تم إعداد phpMyAdmin بنجاح!\n";
    echo "\n📝 الخطوات التالية:\n";
    echo "1. انسخ الملف config-fixed.inc.php إلى C:\\xampp\\phpMyAdmin\\config.inc.php\n";
    echo "2. أعد تشغيل Apache\n";
    echo "3. افتح phpMyAdmin في المتصفح\n";
    
    $conn->close();
    
} catch (Exception $e) {
    echo "❌ خطأ: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "© 2024 SAIEB Services - phpMyAdmin Setup\n";
?>