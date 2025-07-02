<?php
include 'db.php';


$tableName = $prefix . "requests";
$req_cli_name = strip_tags($_POST['req_cli_name']);
$req_cli_email = strip_tags($_POST['req_cli_email']);
$req_cli_phone = strip_tags($_POST['req_cli_phone']);
$req_cli_time_to_call = strip_tags($_POST['req_cli_time_to_call']);
$req_ser_id = strip_tags($_POST['req_ser_id']);
$req_ser_type = strip_tags($_POST['req_ser_type']);


$sql = "INSERT INTO $tableName
    ( `req_ser_id`,  `req_ser_type`,  `req_cli_name` ,`req_cli_email`, `req_cli_phone` ,`req_cli_time_to_call` , `req_time` , req_status)
    VALUES
    (  '$req_ser_id',  '$req_ser_type' , '$req_cli_name','$req_cli_email',  '$req_cli_phone' , '$req_cli_time_to_call' , NOW() , 1);";

 
if ($conn->query($sql)) {
    echo '1';
} else {
    echo '2';

}