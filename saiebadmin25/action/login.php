<?php
include 'db.php';

$adname = strip_tags($_POST['adname']);
$adpass = strip_tags($_POST['adpass']);


if ($adname == 'soliman' && $adpass == 'sol24#Ym_') {

    $cookie_expire = time() + 10800;
    $cookie_path = "/";
    setcookie('isLoggedin', true, $cookie_expire, $cookie_path);
    header("location:../index.php");
}
