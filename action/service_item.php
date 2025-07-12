<?php
include 'db.php';
include 'seo_url.php'; // تضمين ملف SEO URLs

$tableName = $prefix . "articles";

// إضافة تتبع للتشخيص
file_put_contents('debug.log', "DEBUG: REQUEST_URI = " . $_SERVER['REQUEST_URI'] . "\n", FILE_APPEND);
file_put_contents('debug.log', "DEBUG: GET parameters = " . print_r($_GET, true) . "\n", FILE_APPEND);

// التحقق من وجود معرف الخدمة
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // إضافة تتبع للتشخيص
    file_put_contents('debug.log', "DEBUG: No ID found, redirecting to home\n", FILE_APPEND);
    // إعادة توجيه إلى الصفحة الرئيسية إذا لم يوجد معرف
    header("Location: " . getStaticPageUrl('home'));
    exit();
}

// التحقق من صحة المعرف (يجب أن يكون رقم)
$service_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if ($service_id === false || $service_id <= 0) {
    header("Location: " . getStaticPageUrl('home'));
    exit();
}

// استعلام آمن باستخدام prepared statement
$sql = "SELECT * FROM $tableName WHERE ar_id = ? AND ar_status != 3";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $service_id);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_assoc();

// التحقق من وجود الخدمة
if (!$rows) {
    // إعادة توجيه إلى صفحة 404 إذا لم توجد الخدمة
    header("HTTP/1.0 404 Not Found");
    include '404.php';
    exit();
}
