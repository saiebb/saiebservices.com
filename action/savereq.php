<?php
include 'db.php';
include 'send_email_notification.php';
include 'email_fallback.php';


$tableName = $prefix . "requests";
$req_cli_name = strip_tags($_POST['req_cli_name']);
$req_cli_email = strip_tags($_POST['req_cli_email']);
$req_cli_phone = strip_tags($_POST['req_cli_phone']);
$req_cli_time_to_call = strip_tags($_POST['req_cli_time_to_call']);
$req_ser_id = strip_tags($_POST['req_ser_id']);
$req_ser_type = strip_tags($_POST['req_ser_type']);
$google_reviews_consent = isset($_POST['google_reviews_consent']) ? intval($_POST['google_reviews_consent']) : 0;


// التحقق من وجود عمود google_reviews_consent في الجدول
$checkColumn = "SHOW COLUMNS FROM $tableName LIKE 'google_reviews_consent'";
$columnExists = $conn->query($checkColumn)->num_rows > 0;

if ($columnExists) {
    // إذا كان العمود موجود، أدرج البيانات مع موافقة Google
    $sql = "INSERT INTO $tableName
        ( `req_ser_id`,  `req_ser_type`,  `req_cli_name` ,`req_cli_email`, `req_cli_phone` ,`req_cli_time_to_call` , `req_time` , req_status, google_reviews_consent)
        VALUES
        (  '$req_ser_id',  '$req_ser_type' , '$req_cli_name','$req_cli_email',  '$req_cli_phone' , '$req_cli_time_to_call' , NOW() , 1, $google_reviews_consent);";
} else {
    // إذا لم يكن العمود موجود، أدرج البيانات بدون موافقة Google (للتوافق مع النظام الحالي)
    $sql = "INSERT INTO $tableName
        ( `req_ser_id`,  `req_ser_type`,  `req_cli_name` ,`req_cli_email`, `req_cli_phone` ,`req_cli_time_to_call` , `req_time` , req_status)
        VALUES
        (  '$req_ser_id',  '$req_ser_type' , '$req_cli_name','$req_cli_email',  '$req_cli_phone' , '$req_cli_time_to_call' , NOW() , 1);";
}

 
if ($conn->query($sql)) {
    // إرسال إشعار بالإيميل عند نجاح حفظ الطلب
    try {
        // الحصول على بيانات الخدمة
        $serviceData = getServiceData($conn, $prefix, $req_ser_id);
        
        if ($serviceData) {
            // إعداد بيانات العميل
            $clientData = [
                'name' => $req_cli_name,
                'email' => $req_cli_email,
                'phone' => $req_cli_phone,
                'preferred_time' => $req_cli_time_to_call,
                'google_consent' => $google_reviews_consent
            ];
            
            // إرسال الإشعار
            $emailSent = sendServiceRequestNotification($serviceData, $clientData);
            
            // في حالة فشل الإرسال، استخدم النظام الاحتياطي
            if (!$emailSent) {
                // محاولة إرسال إيميل بسيط
                $fallbackSent = sendSimpleEmailNotification(
                    $serviceData['title'], 
                    $req_cli_name, 
                    $req_cli_email, 
                    $req_cli_phone
                );
                
                // حفظ الإشعار في ملف نصي كنظام احتياطي
                saveNotificationToFile($serviceData, $clientData);
                
                $emailSent = $fallbackSent; // تحديث حالة الإرسال
            }
            
            // تسجيل نتيجة الإرسال
            $logMessage = date('Y-m-d H:i:s') . " - Service request saved successfully. Email notification: " . 
                         ($emailSent ? "SENT" : "FAILED") . 
                         " - Service ID: $req_ser_id - Client: $req_cli_name\n";
            file_put_contents('service_requests.log', $logMessage, FILE_APPEND | LOCK_EX);
        }
    } catch (Exception $e) {
        // تسجيل الخطأ في حالة فشل إرسال الإيميل
        $errorMessage = date('Y-m-d H:i:s') . " - Email notification error: " . $e->getMessage() . 
                       " - Service ID: $req_ser_id - Client: $req_cli_name\n";
        file_put_contents('email_errors.log', $errorMessage, FILE_APPEND | LOCK_EX);
    }
    
    echo '1';
} else {
    echo '2';
}