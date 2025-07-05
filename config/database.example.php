<?php
/**
 * مثال على إعدادات قاعدة البيانات - SAIEB Services
 * Database Configuration Example
 * 
 * انسخ هذا الملف إلى database.php وعدل الإعدادات حسب بيئتك
 * Copy this file to database.php and modify settings for your environment
 */

class DatabaseConfig {
    
    private static $instance = null;
    private $config = [];
    
    private function __construct() {
        $this->detectEnvironment();
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * كشف البيئة الحالية تلقائياً
     * Auto-detect current environment
     */
    private function detectEnvironment() {
        $serverName = $_SERVER['SERVER_NAME'] ?? $_SERVER['HTTP_HOST'] ?? 'localhost';
        $documentRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
        $serverAddr = $_SERVER['SERVER_ADDR'] ?? '127.0.0.1';
        
        // تحديد البيئة بناءً على عدة عوامل
        $isLocal = (
            $serverName === 'localhost' ||
            $serverName === '127.0.0.1' ||
            strpos($serverName, '.local') !== false ||
            strpos($serverName, 'localhost:') === 0 ||
            $serverAddr === '127.0.0.1' ||
            $serverAddr === '::1' ||
            strpos($documentRoot, 'xampp') !== false ||
            strpos($documentRoot, 'wamp') !== false ||
            strpos($documentRoot, 'mamp') !== false ||
            strpos($documentRoot, 'laragon') !== false
        );
        
        if ($isLocal) {
            $this->setLocalEnvironment();
        } else {
            $this->setProductionEnvironment();
        }
    }
    
    /**
     * إعدادات بيئة التطوير المحلي
     * Local development environment settings
     */
    private function setLocalEnvironment() {
        // التحقق من المنفذ المستخدم في XAMPP
        $port = 3306; // المنفذ الافتراضي
        
        // فحص إعدادات XAMPP للمنفذ المخصص
        $xamppConfigPaths = [
            'C:/xampp/mysql/bin/my.ini',
            'C:/Program Files/xampp/mysql/bin/my.ini',
            'C:/Program Files (x86)/xampp/mysql/bin/my.ini',
            'D:/xampp/mysql/bin/my.ini'
        ];
        
        foreach ($xamppConfigPaths as $configPath) {
            if (file_exists($configPath)) {
                $configContent = file_get_contents($configPath);
                if (preg_match('/port\s*=\s*(\d+)/', $configContent, $matches)) {
                    $port = (int)$matches[1];
                    break;
                }
            }
        }
        
        $this->config = [
            'environment' => 'local',
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'saiebservices',
            'port' => $port,
            'charset' => 'utf8mb4',
            'prefix' => 'sa_',
            'debug' => true,
            'error_reporting' => true
        ];
    }
    
    /**
     * إعدادات الخادم المباشر
     * Production server settings
     */
    private function setProductionEnvironment() {
        $this->config = [
            'environment' => 'production',
            'host' => 'localhost',
            'username' => 'YOUR_DB_USERNAME',
            'password' => 'YOUR_DB_PASSWORD',
            'database' => 'YOUR_DB_NAME',
            'port' => 3306,
            'charset' => 'utf8mb4',
            'prefix' => 'sa_',
            'debug' => false,
            'error_reporting' => false
        ];
    }
    
    // باقي الكود مثل الملف الأصلي...
    // Rest of the code same as original file...
}

// ملاحظة: هذا ملف مثال فقط
// Note: This is an example file only
// انسخه إلى database.php وعدل الإعدادات
// Copy to database.php and modify settings
?>