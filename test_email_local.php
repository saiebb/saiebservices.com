<?php
/**
 * اختبار نظام الإيميل المحلي المحسن
 */

echo "<h2>📧 اختبار نظام الإيميل المحلي</h2>";

// دالة إرسال إيميل محلي
function sendLocalEmail($to, $subject, $message, $headers = []) {
    // في البيئة المحلية، نحفظ الإيميل في ملف
    $emailContent = "\n" . str_repeat("=", 60) . "\n";
    $emailContent .= "📧 إيميل جديد\n";
    $emailContent .= "التاريخ: " . date("Y-m-d H:i:s") . "\n";
    $emailContent .= "إلى: $to\n";
    $emailContent .= "الموضوع: $subject\n";
    $emailContent .= str_repeat("-", 60) . "\n";
    $emailContent .= "الرسالة:\n$message\n";
    $emailContent .= str_repeat("=", 60) . "\n";
    
    // حفظ الإيميل في ملف
    $saved = file_put_contents("local_emails.log", $emailContent, FILE_APPEND | LOCK_EX);
    
    return $saved !== false;
}

// اختبار إرسال إيميل
$testServiceData = [
    'id' => 138,
    'title' => 'خدمة تأشيرات الزيارة والإنجاز',
    'type' => 3,
    'type_name' => 'خدمات الأفراد والمنشآت'
];

$testClientData = [
    'name' => 'أحمد محمد',
    'email' => 'ahmed@example.com',
    'phone' => '0501234567',
    'preferred_time' => 'من 9 صباحاً إلى 5 مساءً',
    'google_consent' => 1
];

// إنشاء محتوى الإيميل
$emailContent = "
طلب خدمة جديد من موقع صيب للخدمات

معلومات الخدمة:
- اسم الخدمة: " . $testServiceData['title'] . "
- نوع الخدمة: " . $testServiceData['type_name'] . "
- معرف الخدمة: " . $testServiceData['id'] . "

معلومات العميل:
- الاسم: " . $testClientData['name'] . "
- البريد الإلكتروني: " . $testClientData['email'] . "
- رقم الجوال: " . $testClientData['phone'] . "
- الوقت المفضل للاتصال: " . $testClientData['preferred_time'] . "
- موافقة على آراء Google: " . ($testClientData['google_consent'] ? 'نعم' : 'لا') . "
- تاريخ الطلب: " . date('Y-m-d H:i:s') . "

يرجى التواصل مع العميل في أقرب وقت ممكن.
";

echo "<p>🔄 جاري إرسال إيميل تجريبي...</p>";

$result = sendLocalEmail(
    'mostaql.dev@gmail.com',
    'طلب خدمة جديد - ' . $testServiceData['title'],
    $emailContent
);

if ($result) {
    echo "<div style='color: green; padding: 15px; border: 1px solid green; background-color: #f0fff0; border-radius: 5px;'>";
    echo "<h3>✅ تم حفظ الإيميل بنجاح!</h3>";
    echo "<p><strong>📁 مكان الحفظ:</strong> <code>local_emails.log</code></p>";
    echo "<p><strong>📧 المرسل إليه:</strong> mostaql.dev@gmail.com</p>";
    echo "<p><strong>📝 الموضوع:</strong> طلب خدمة جديد - " . $testServiceData['title'] . "</p>";
    echo "</div>";
    
    // عرض محتوى الملف
    if (file_exists('local_emails.log')) {
        echo "<hr>";
        echo "<h3>📄 محتوى ملف الإيميلات المحلية:</h3>";
        echo "<div style='background-color: #f8f9fa; padding: 15px; border: 1px solid #dee2e6; border-radius: 5px; max-height: 400px; overflow-y: auto;'>";
        echo "<pre style='margin: 0; white-space: pre-wrap;'>";
        echo htmlspecialchars(file_get_contents('local_emails.log'));
        echo "</pre>";
        echo "</div>";
    }
    
} else {
    echo "<div style='color: red; padding: 15px; border: 1px solid red; background-color: #fff0f0; border-radius: 5px;'>";
    echo "<h3>❌ فشل في حفظ الإيميل</h3>";
    echo "<p>تحقق من صلاحيات الكتابة في المجلد</p>";
    echo "</div>";
}

echo "<hr>";
echo "<h3>🔧 تحديث نظام الإيميل الرئيسي</h3>";

// تحديث ملف send_email_notification.php ليستخدم النظام المحلي
$updatedEmailFunction = '<?php
/**
 * ملف إرسال إشعارات الإيميل - محسن للتشغيل المحلي
 */

// تضمين إعدادات الإيميل
include_once "../config/email_config.php";

function sendServiceRequestNotification($serviceData, $clientData) {
    $to = defined("NOTIFICATION_EMAIL") ? NOTIFICATION_EMAIL : "mostaql.dev@gmail.com";
    $subject = "طلب خدمة جديد - " . $serviceData["title"];
    
    // إنشاء محتوى الإيميل النصي للبيئة المحلية
    $message = "
طلب خدمة جديد من موقع صيب للخدمات

معلومات الخدمة المطلوبة:
- اسم الخدمة: " . $serviceData["title"] . "
- نوع الخدمة: " . $serviceData["type_name"] . "
- معرف الخدمة: " . $serviceData["id"] . "

معلومات العميل:
- الاسم: " . $clientData["name"] . "
- البريد الإلكتروني: " . $clientData["email"] . "
- رقم الجوال: " . $clientData["phone"] . "
- الوقت المفضل للاتصال: " . $clientData["preferred_time"] . "
- تاريخ الطلب: " . date("Y-m-d H:i:s") . "
- موافقة على آراء Google: " . ($clientData["google_consent"] ? "نعم" : "لا") . "

ملاحظة مهمة:
يرجى التواصل مع العميل في أقرب وقت ممكن لتقديم الخدمة المطلوبة.

---
هذا إشعار تلقائي من نظام إدارة طلبات الخدمات - موقع صيب للخدمات
تاريخ الإرسال: " . date("Y-m-d H:i:s") . "
    ";
    
    // في البيئة المحلية، احفظ في ملف
    $isLocal = (
        $_SERVER["SERVER_NAME"] === "localhost" ||
        strpos($_SERVER["SERVER_NAME"], "localhost:") === 0 ||
        $_SERVER["SERVER_ADDR"] === "127.0.0.1"
    );
    
    if ($isLocal) {
        // حفظ الإيميل في ملف للبيئة المحلية
        $emailContent = "\n" . str_repeat("=", 60) . "\n";
        $emailContent .= "📧 إشعار طلب خدمة جديد\n";
        $emailContent .= "التاريخ: " . date("Y-m-d H:i:s") . "\n";
        $emailContent .= "إلى: $to\n";
        $emailContent .= "الموضوع: $subject\n";
        $emailContent .= str_repeat("-", 60) . "\n";
        $emailContent .= $message . "\n";
        $emailContent .= str_repeat("=", 60) . "\n";
        
        $success = file_put_contents("local_emails.log", $emailContent, FILE_APPEND | LOCK_EX);
        $success = $success !== false;
    } else {
        // في البيئة المباشرة، أرسل إيميل حقيقي
        $headers = array(
            "MIME-Version: 1.0",
            "Content-type: text/plain; charset=UTF-8",
            "From: نظام صيب للخدمات <noreply@saiebservices.com>",
            "Reply-To: " . $clientData["email"],
            "X-Mailer: PHP/" . phpversion()
        );
        
        $success = mail($to, $subject, $message, implode("\r\n", $headers));
    }
    
    // تسجيل محاولة الإرسال في ملف log
    $logMessage = date("Y-m-d H:i:s") . " - Email notification attempt: " . 
                  ($success ? "SUCCESS" : "FAILED") . 
                  " - Service: " . $serviceData["title"] . 
                  " - Client: " . $clientData["name"] . 
                  " (" . $clientData["email"] . ")" . 
                  " - Environment: " . ($isLocal ? "LOCAL" : "PRODUCTION") . "\n";
    
    file_put_contents("email_notifications.log", $logMessage, FILE_APPEND | LOCK_EX);
    
    return $success;
}

// باقي الدوال كما هي...
function getServiceTypeName($type) {
    switch ($type) {
        case 1:
            return "التدريب";
        case 2:
            return "خدمات الأعمال";
        case 3:
            return "خدمات الأفراد والمنشآت";
        case 4:
        case 6:
            return "الاستشارات المالية";
        default:
            return "خدمات عامة";
    }
}

function getServiceData($conn, $prefix, $serviceId) {
    $tableName = $prefix . "articles";
    $sql = "SELECT ar_id, ar_title, ar_type FROM $tableName WHERE ar_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();
    
    if ($service) {
        return [
            "id" => $service["ar_id"],
            "title" => $service["ar_title"],
            "type" => $service["ar_type"],
            "type_name" => getServiceTypeName($service["ar_type"])
        ];
    }
    
    return null;
}
?>';

file_put_contents('action/send_email_notification.php', $updatedEmailFunction);

echo "<p style='color: green;'>✅ تم تحديث نظام الإيميل الرئيسي للعمل محلياً</p>";

echo "<hr>";
echo "<h3>🎯 الخطوات التالية:</h3>";
echo "<ol>";
echo "<li><strong>إصلاح الروابط:</strong> <a href='fix_urls.php'>تشغيل إصلاح الروابط</a></li>";
echo "<li><strong>اختبار الخدمة:</strong> <a href='service-detail.php?id=138'>اختبار صفحة الخدمة</a></li>";
echo "<li><strong>اختبار طلب الخدمة:</strong> جرب الضغط على \"احصل على الخدمة\" في الصفحة أعلاه</li>";
echo "</ol>";

echo "<div style='margin-top: 20px; padding: 15px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px;'>";
echo "<h4>✅ تم إصلاح مشكلة الإيميل!</h4>";
echo "<p>الآن سيتم حفظ جميع الإيميلات في ملف <code>local_emails.log</code> في البيئة المحلية</p>";
echo "<p>يمكنك مراجعة هذا الملف لرؤية جميع الإشعارات المرسلة</p>";
echo "</div>";
?>