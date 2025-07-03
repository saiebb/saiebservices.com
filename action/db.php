<?php
/**
 * ملف الاتصال بقاعدة البيانات - SAIEB Services
 * Database Connection File with Auto Environment Detection
 * 
 * يتم التبديل تلقائياً بين بيئة التطوير والخادم المباشر
 */

// تضمين ملف إعدادات قاعدة البيانات
require_once dirname(__DIR__) . '/config/database.php';

// الحصول على معلومات البيئة (للتطوير فقط)
if ($isLocal) {
    // يمكن إضافة رسائل تطوير هنا إذا لزم الأمر
    // echo "<!-- البيئة الحالية: تطوير محلي -->";
}

// المتغيرات متاحة الآن للاستخدام:
// $conn - اتصال قاعدة البيانات
// $servername, $username, $password, $dbName, $prefix - متغيرات الإعدادات
// $isLocal, $isProduction - للتحقق من البيئة
