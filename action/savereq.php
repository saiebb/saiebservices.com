<?php
include 'db.php';

$tableName = $prefix . "requests";
$req_cli_name = strip_tags($_POST['req_cli_name']);
$req_cli_email = strip_tags($_POST['req_cli_email']);
$req_cli_phone = strip_tags($_POST['req_cli_phone']);
$req_cli_time_to_call = strip_tags($_POST['req_cli_time_to_call']);
$req_ser_id = strip_tags($_POST['req_ser_id']);
$req_ser_type = strip_tags($_POST['req_ser_type']);

// إنشاء معرف طلب فريد
$order_id = 'SAIEB-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

// التحقق من عدم تكرار معرف الطلب
$check_sql = "SELECT req_id FROM $tableName WHERE req_order_id = '$order_id'";
$check_result = $conn->query($check_sql);

// إذا كان المعرف موجود، أنشئ معرف جديد
while ($check_result->num_rows > 0) {
    $order_id = 'SAIEB-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
    $check_result = $conn->query("SELECT req_id FROM $tableName WHERE req_order_id = '$order_id'");
}

$sql = "INSERT INTO $tableName
    ( `req_ser_id`,  `req_ser_type`,  `req_cli_name` ,`req_cli_email`, `req_cli_phone` ,`req_cli_time_to_call` , `req_time` , req_status, req_order_id)
    VALUES
    (  '$req_ser_id',  '$req_ser_type' , '$req_cli_name','$req_cli_email',  '$req_cli_phone' , '$req_cli_time_to_call' , NOW() , 1, '$order_id');";

if ($conn->query($sql)) {
    // إرجاع معرف الطلب للاستخدام في إعادة التوجيه
    echo json_encode([
        'status' => 'success',
        'order_id' => $order_id,
        'message' => 'تم حفظ الطلب بنجاح'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'حدث خطأ في حفظ الطلب'
    ]);
}