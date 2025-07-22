<?php
/**
 * نظام احتياطي لإرسال الإيميل في حالة فشل النظام الأساسي
 */

/**
 * إرسال إيميل بسيط كنظام احتياطي
 */
function sendSimpleEmailNotification($serviceTitle, $clientName, $clientEmail, $clientPhone) {
    $to = "mostaql.dev@gmail.com";
    $subject = "طلب خدمة جديد - " . $serviceTitle;
    
    $message = "طلب خدمة جديد من موقع صيب للخدمات\n\n";
    $message .= "الخدمة المطلوبة: " . $serviceTitle . "\n";
    $message .= "اسم العميل: " . $clientName . "\n";
    $message .= "إيميل العميل: " . $clientEmail . "\n";
    $message .= "جوال العميل: " . $clientPhone . "\n";
    $message .= "تاريخ الطلب: " . date('Y-m-d H:i:s') . "\n";
    
    $headers = "From: noreply@saiebservices.com\r\n";
    $headers .= "Reply-To: " . $clientEmail . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    return mail($to, $subject, $message, $headers);
}

/**
 * حفظ الإشعار في ملف نصي كنظام احتياطي
 */
function saveNotificationToFile($serviceData, $clientData) {
    $filename = 'pending_notifications.txt';
    $content = "\n" . str_repeat("=", 50) . "\n";
    $content .= "تاريخ الطلب: " . date('Y-m-d H:i:s') . "\n";
    $content .= "الخدمة: " . $serviceData['title'] . " (ID: " . $serviceData['id'] . ")\n";
    $content .= "نوع الخدمة: " . $serviceData['type_name'] . "\n";
    $content .= "العميل: " . $clientData['name'] . "\n";
    $content .= "الإيميل: " . $clientData['email'] . "\n";
    $content .= "الجوال: " . $clientData['phone'] . "\n";
    $content .= "الوقت المفضل: " . $clientData['preferred_time'] . "\n";
    $content .= "موافقة Google: " . ($clientData['google_consent'] ? 'نعم' : 'لا') . "\n";
    $content .= str_repeat("=", 50) . "\n";
    
    return file_put_contents($filename, $content, FILE_APPEND | LOCK_EX);
}

/**
 * إرسال إشعار عبر webhook (يمكن استخدامه مع خدمات خارجية)
 */
function sendWebhookNotification($serviceData, $clientData) {
    $webhookUrl = ""; // يمكن إضافة URL webhook هنا
    
    if (empty($webhookUrl)) {
        return false;
    }
    
    $data = [
        'service' => $serviceData,
        'client' => $clientData,
        'timestamp' => date('Y-m-d H:i:s'),
        'source' => 'saieb_services_website'
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($webhookUrl, false, $context);
    
    return $result !== false;
}
?>