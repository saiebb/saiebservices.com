<?php
/**
 * إعدادات قاعدة البيانات للإنتاج - SAIEB Services
 * Production Database Configuration
 */

class DatabaseConfig {
    
    private static $instance = null;
    private $config = [];
    
    private function __construct() {
        // إعدادات قاعدة البيانات للإنتاج
        $this->config = [
            'host'     => 'localhost', // استبدل بعنوان خادم قاعدة البيانات
            'database' => 'saiebser_db', // استبدل باسم قاعدة البيانات
            'username' => 'saiebser_user', // استبدل باسم المستخدم
            'password' => 'your_strong_password', // استبدل بكلمة المرور
            'charset'  => 'utf8mb4',
            'prefix'   => ''
        ];
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConfig() {
        return $this->config;
    }
}
