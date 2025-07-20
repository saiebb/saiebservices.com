<?php
include 'action/base.php';
include 'action/db.php';

$tableName = $prefix . "articles";

// إدراج مقال تجريبي
$stmt = $conn->prepare("INSERT INTO $tableName (ar_type, ar_status, ar_title, ar_text, ar_date) VALUES (4, 1, ?, ?, NOW())");
$title = "مقال تجريبي للاختبار";
$text = "هذا مقال تجريبي لاختبار نظام الروابط الجديد في الموقع.";
$stmt->bind_param("ss", $title, $text);

if ($stmt->execute()) {
    $newId = $conn->insert_id;
    echo "تم إنشاء المقال بنجاح. ID: " . $newId . "<br>";
    echo "رابط المقال: <a href='" . BASE_URL . "/blog/test-article-" . $newId . "'>" . BASE_URL . "/blog/test-article-" . $newId . "</a>";
} else {
    echo "خطأ في إنشاء المقال: " . $conn->error;
}
?>