<?php
/**
 * تشخيص سريع للمشكلة
 */

include 'action/db.php';
include 'action/base.php';
include 'action/seo_url.php';

echo "<h2>تشخيص سريع للمشكلة</h2>";

echo "<h3>1. فحص BASE_URL:</h3>";
echo "<p>BASE_URL: <strong>" . BASE_URL . "</strong></p>";

echo "<h3>2. فحص المقالات المشكلة:</h3>";
$test_ids = [97, 23];

foreach ($test_ids as $id) {
    echo "<h4>المقال رقم $id:</h4>";
    
    $stmt = $conn->prepare("SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo "العنوان: " . htmlspecialchars($row['ar_title']) . "<br>";
        echo "Slug في قاعدة البيانات: " . htmlspecialchars($row['ar_slug']) . "<br>";
        
        // اختبار دالة getBlogUrl
        $url1 = getBlogUrl($row['ar_id'], $row['ar_title'], $row['ar_slug']);
        echo "الرابط المولد (مع slug): <strong>$url1</strong><br>";
        
        $url2 = getBlogUrl($row['ar_id'], $row['ar_title']);
        echo "الرابط المولد (بدون slug): <strong>$url2</strong><br>";
        
        $url3 = getBlogUrl($row['ar_id']);
        echo "الرابط المولد (ID فقط): <strong>$url3</strong><br>";
        
        // اختبار extractIdFromUrl
        $test_path = str_replace(BASE_URL, '', $url1);
        echo "المسار للاختبار: $test_path<br>";
        
        $_GET = [];
        $extract_result = extractIdFromUrl($test_path);
        echo "نتيجة extractIdFromUrl: " . ($extract_result ? 'نجح' : 'فشل') . "<br>";
        if (isset($_GET['id'])) {
            echo "ID المستخرج: " . $_GET['id'] . "<br>";
        }
        
        echo "<hr>";
    }
}

echo "<h3>3. اختبار الروابط المختلفة:</h3>";
$test_urls = [
    '/saieb/blog/dwra-tqyym-alada-alwzyfy-97',
    '/blog/dwra-tqyym-alada-alwzyfy-97',
    '/saieb/blog/article-97',
    '/blog/article-97'
];

foreach ($test_urls as $url) {
    $_GET = [];
    $result = extractIdFromUrl($url);
    $id = isset($_GET['id']) ? $_GET['id'] : 'لا يوجد';
    echo "الرابط: $url → النتيجة: " . ($result ? 'نجح' : 'فشل') . " → ID: $id<br>";
}

$conn->close();
?>