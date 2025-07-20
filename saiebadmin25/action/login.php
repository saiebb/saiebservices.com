<?php
include 'db.php';

// التحقق من وجود البيانات المطلوبة
if (!isset($_POST['adname']) || !isset($_POST['adpass'])) {
    header("location:../login.php?error=missing_data");
    exit();
}

$adname = strip_tags($_POST['adname']);
$adpass = strip_tags($_POST['adpass']);

// التحقق من عدم كون الحقول فارغة
if (empty($adname) || empty($adpass)) {
    header("location:../login.php?error=empty_fields");
    exit();
}

// التحقق من بيانات تسجيل الدخول
if ($adname == 'soliman' && $adpass == 'sol24#Ym_') {
    // تسجيل دخول ناجح
    $cookie_expire = time() + 10800; // 3 ساعات
    $cookie_path = "/";
    setcookie('isLoggedin', true, $cookie_expire, $cookie_path);
    
    // إعادة توجيه إلى لوحة التحكم
    header("location:../index.php");
    exit();
} else {
    // بيانات خاطئة
    header("location:../login.php?error=invalid_credentials");
    exit();
}
