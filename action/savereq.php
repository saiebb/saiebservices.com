<?php
include 'db.php';


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
    echo '1';
} else {
    echo '2';

}