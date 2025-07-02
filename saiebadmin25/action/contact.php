<?php
include 'db.php';
$tableName = $prefix . "contact";


$con_address = strip_tags($_POST['con_address']);
$con_email = strip_tags($_POST['con_email']);
$con_tel = strip_tags($_POST['con_tel']);
$con_instagram = strip_tags($_POST['con_instagram']);
$con_x = strip_tags($_POST['con_x']);
$con_linkedin = strip_tags($_POST['con_linkedin']);

$sql = "update $tableName
set
con_address = '$con_address' ,
con_email =  '$con_email' ,
con_tel =  '$con_tel',
con_instagram =  '$con_instagram',
con_x =  '$con_x',
con_linkedin =  '$con_linkedin'
where
con_id  = 1" ;


// check if email already exist

if ($conn->query($sql)) {
    header("location:../contact.php?s=3");
} else {
    header("location:../contact-add.php?e=1");

}
