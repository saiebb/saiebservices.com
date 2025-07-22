<?php
/**
 * إعدادات الإيميل للموقع
 */

// إعدادات الإيميل الأساسية
define('EMAIL_FROM_ADDRESS', 'noreply@saiebservices.com');
define('EMAIL_FROM_NAME', 'نظام صيب للخدمات');
define('NOTIFICATION_EMAIL', 'mostaql.dev@gmail.com');

// إعدادات SMTP (اختيارية - يمكن استخدامها مع PHPMailer)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', ''); // يمكن إضافة بيانات SMTP هنا لاحقاً
define('SMTP_PASSWORD', '');
define('SMTP_ENCRYPTION', 'tls');

// إعدادات أخرى
define('EMAIL_DEBUG', true); // تفعيل تسجيل أخطاء الإيميل
define('EMAIL_CHARSET', 'UTF-8');
?>