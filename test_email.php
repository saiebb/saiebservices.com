<?php
/**
 * ملف اختبار إرسال الإيميل
 * يمكن استخدامه للتأكد من أن نظام الإيميل يعمل بشكل صحيح
 */

include 'action/db.php';
include 'action/send_email_notification.php';

// بيانات تجريبية للاختبار
$testServiceData = [
    'id' => 1,
    'title' => 'خدمة تجريبية للاختبار',
    'type' => 2,
    'type_name' => 'خدمات الأعمال'
];

$testClientData = [
    'name' => 'عميل تجريبي',
    'email' => 'test@example.com',
    'phone' => '0501234567',
    'preferred_time' => 'من 9 صباحاً إلى 5 مساءً',
    'google_consent' => 1
];

echo "<h2>اختبار نظام إرسال الإشعارات بالإيميل</h2>";
echo "<p>جاري إرسال إيميل تجريبي...</p>";

try {
    $result = sendServiceRequestNotification($testServiceData, $testClientData);
    
    if ($result) {
        echo "<div style='color: green; padding: 10px; border: 1px solid green; background-color: #f0fff0;'>";
        echo "<strong>✅ تم إرسال الإيميل بنجاح!</strong><br>";
        echo "تم إرسال إشعار تجريبي إلى: mostaql.dev@gmail.com";
        echo "</div>";
    } else {
        echo "<div style='color: red; padding: 10px; border: 1px solid red; background-color: #fff0f0;'>";
        echo "<strong>❌ فشل في إرسال الإيميل</strong><br>";
        echo "يرجى التحقق من إعدادات الخادم أو ملفات السجل";
        echo "</div>";
    }
} catch (Exception $e) {
    echo "<div style='color: red; padding: 10px; border: 1px solid red; background-color: #fff0f0;'>";
    echo "<strong>❌ حدث خطأ:</strong><br>";
    echo htmlspecialchars($e->getMessage());
    echo "</div>";
}

echo "<hr>";
echo "<h3>معلومات النظام:</h3>";
echo "<ul>";
echo "<li><strong>PHP Version:</strong> " . phpversion() . "</li>";
echo "<li><strong>Mail Function:</strong> " . (function_exists('mail') ? 'متوفرة' : 'غير متوفرة') . "</li>";
echo "<li><strong>SMTP:</strong> " . (ini_get('SMTP') ? ini_get('SMTP') : 'غير محدد') . "</li>";
echo "<li><strong>smtp_port:</strong> " . (ini_get('smtp_port') ? ini_get('smtp_port') : 'غير محدد') . "</li>";
echo "<li><strong>sendmail_from:</strong> " . (ini_get('sendmail_from') ? ini_get('sendmail_from') : 'غير محدد') . "</li>";
echo "</ul>";

echo "<hr>";
echo "<p><strong>ملاحظة:</strong> هذا الملف للاختبار فقط. يرجى حذفه من الخادم المباشر بعد التأكد من عمل النظام.</p>";
?>