<?php
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
?>