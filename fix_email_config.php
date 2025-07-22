<?php
/**
 * إصلاح إعدادات الإيميل للتشغيل المحلي
 */

echo "<h2>🔧 إصلاح إعدادات الإيميل</h2>";

// تحديث إعدادات PHP للإيميل
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', '587');
ini_set('sendmail_from', 'noreply@saiebservices.com');

// إنشاء ملف إعدادات محلي للإيميل
$emailConfigContent = '<?php
/**
 * إعدادات الإيميل المحلية - تم إصلاحها للتشغيل المحلي
 */

// إعدادات الإيميل الأساسية
define("EMAIL_FROM_ADDRESS", "noreply@saiebservices.com");
define("EMAIL_FROM_NAME", "نظام صيب للخدمات");
define("NOTIFICATION_EMAIL", "mostaql.dev@gmail.com");

// إعدادات SMTP للتشغيل المحلي
define("SMTP_HOST", "smtp.gmail.com");
define("SMTP_PORT", 587);
define("SMTP_USERNAME", ""); // يمكن إضافة بيانات SMTP هنا لاحقاً
define("SMTP_PASSWORD", "");
define("SMTP_ENCRYPTION", "tls");

// إعدادات أخرى
define("EMAIL_DEBUG", true);
define("EMAIL_CHARSET", "UTF-8");

// تحديث إعدادات PHP للإيميل
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "noreply@saiebservices.com");
?>';

file_put_contents('config/email_config.php', $emailConfigContent);

echo "<p style='color: green;'>✅ تم تحديث إعدادات الإيميل</p>";

// إنشاء نسخة محسنة من دالة إرسال الإيميل
$emailFunctionContent = '<?php
/**
 * دالة إرسال إيميل محسنة للتشغيل المحلي
 */

function sendLocalEmail($to, $subject, $message, $headers = []) {
    // في البيئة المحلية، نحفظ الإيميل في ملف بدلاً من إرساله
    $emailContent = "
=== إيميل جديد ===
التاريخ: " . date("Y-m-d H:i:s") . "
إلى: $to
الموضوع: $subject
الرسالة:
$message
==================
";
    
    // حفظ الإيميل في ملف
    $saved = file_put_contents("local_emails.log", $emailContent, FILE_APPEND | LOCK_EX);
    
    // محاولة إرسال حقيقي (قد يفشل في البيئة المحلية)
    $realSent = false;
    try {
        $realSent = mail($to, $subject, $message, implode("\r\n", $headers));
    } catch (Exception $e) {
        // تجاهل الخطأ في البيئة المحلية
    }
    
    // إرجاع true إذا تم الحفظ في الملف (للتشغيل المحلي)
    return $saved !== false;
}
?>';

file_put_contents('action/local_email.php', $emailFunctionContent);

echo "<p style='color: green;'>✅ تم إنشاء نظام إيميل محلي</p>";

echo "<hr>";
echo "<h3>📧 اختبار الإيميل المحسن</h3>";

// تضمين النظام الجديد
include 'action/local_email.php';

$testResult = sendLocalEmail(
    'mostaql.dev@gmail.com',
    'اختبار الإيميل المحلي',
    'هذا اختبار للإيميل في البيئة المحلية'
);

if ($testResult) {
    echo "<div style='color: green; padding: 15px; border: 1px solid green; background-color: #f0fff0;'>";
    echo "<h4>✅ تم حفظ الإيميل بنجاح!</h4>";
    echo "<p>تم حفظ الإيميل في ملف <code>local_emails.log</code></p>";
    echo "<p>في البيئة المحلية، سيتم حفظ جميع الإيميلات في هذا الملف بدلاً من إرسالها</p>";
    echo "</div>";
} else {
    echo "<div style='color: red; padding: 15px; border: 1px solid red; background-color: #fff0f0;'>";
    echo "<h4>❌ فشل في حفظ الإيميل</h4>";
    echo "</div>";
}

echo "<hr>";
echo "<h3>🔗 الخطوة التالية</h3>";
echo "<p>الآن يمكنك اختبار النظام:</p>";
echo "<ol>";
echo "<li><a href='test_email_local.php'>اختبار الإيميل المحلي</a></li>";
echo "<li><a href='service-detail.php?id=138'>اختبار صفحة الخدمة</a></li>";
echo "</ol>";
?>