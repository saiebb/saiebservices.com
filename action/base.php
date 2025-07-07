<?php
/**
 * ملف تحديد المسار الأساسي للموقع
 * Base URL configuration file
 */

// تحديد المسار الأساسي للموقع
function getBaseUrl() {
    // الحصول على بروتوكول الموقع (http أو https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    
    // الحصول على اسم المضيف
    $host = $_SERVER['HTTP_HOST'];
    
    // تحديد المسار الأساسي
    $baseUrl = $protocol . '://' . $host;
    
    // إذا كان الموقع في بيئة التطوير المحلية (localhost)
    if ($host === 'localhost' || strpos($host, '127.0.0.1') !== false) {
        // استخدام المسار الكامل للمجلد الحالي
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $scriptDir = dirname($scriptName);
        
        // إذا كان المجلد ليس الجذر (/)، أضفه إلى المسار الأساسي
        if ($scriptDir !== '/' && $scriptDir !== '\\') {
            $baseUrl .= $scriptDir;
        }
    } else {
        // في بيئة الإنتاج، استخدم المجال الرئيسي فقط
        // يمكن تعديل هذا حسب هيكل الموقع الفعلي
        $baseUrl = 'https://saiebservices.com';
    }
    
    return rtrim($baseUrl, '/');
}

// تحديد المسار الأساسي للأصول (CSS, JS, Images)
function getAssetsUrl() {
    return getBaseUrl();
}

// تعريف ثوابت للاستخدام في جميع أنحاء الموقع
define('BASE_URL', getBaseUrl());
define('ASSETS_URL', getAssetsUrl());
?>