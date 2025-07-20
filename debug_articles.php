<?php
// ملف تشخيص المقالات
include 'action/db.php';
include 'action/seo_url.php';

echo "<h2>تشخيص مشكلة روابط المقالات</h2>";

// جلب بعض المقالات للفحص
$sql = "SELECT ar_id, ar_title, ar_slug, ar_blog_type FROM sa_articles WHERE ar_type = 4 AND ar_status = 1 ORDER BY ar_id DESC LIMIT 10";
$result = $conn->query($sql);

echo "<h3>المقالات الموجودة في قاعدة البيانات:</h3>";
echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr><th>ID</th><th>العنوان</th><th>Slug المحفوظ</th><th>نوع المدونة</th><th>الرابط المولد</th></tr>";

while ($row = $result->fetch_assoc()) {
    $generatedUrl = getBlogUrl($row['ar_id'], $row['ar_title'], $row['ar_slug']);
    echo "<tr>";
    echo "<td>" . $row['ar_id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['ar_title']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ar_slug']) . "</td>";
    echo "<td>" . $row['ar_blog_type'] . "</td>";
    echo "<td><a href='" . $generatedUrl . "'>" . $generatedUrl . "</a></td>";
    echo "</tr>";
}

echo "</table>";

// فحص المقالات التي لا تعمل
echo "<h3>فحص المقالات المحددة:</h3>";
$problematic_ids = [97, 23];

foreach ($problematic_ids as $id) {
    $sql = "SELECT ar_id, ar_title, ar_slug, ar_blog_type FROM sa_articles WHERE ar_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo "<h4>المقال رقم $id:</h4>";
        echo "العنوان: " . htmlspecialchars($row['ar_title']) . "<br>";
        echo "Slug المحفوظ: " . htmlspecialchars($row['ar_slug']) . "<br>";
        echo "نوع المدونة: " . $row['ar_blog_type'] . "<br>";
        
        $generatedUrl = getBlogUrl($row['ar_id'], $row['ar_title'], $row['ar_slug']);
        echo "الرابط المولد: <a href='" . $generatedUrl . "'>" . $generatedUrl . "</a><br>";
        
        // اختبار slugify
        $testSlug = slugify($row['ar_title']);
        echo "Slug المولد من العنوان: " . $testSlug . "<br>";
        echo "<hr>";
    } else {
        echo "<h4>المقال رقم $id غير موجود</h4>";
    }
}

echo "<h3>اختبار BASE_URL:</h3>";
echo "BASE_URL: " . BASE_URL . "<br>";

echo "<h3>اختبار extractIdFromUrl:</h3>";
$test_urls = [
    '/blog/article-97',
    '/blog/article-23',
    '/saieb/blog/bna-khta-astratyjya-lshrka-tyth-llhlwyat-28',
    '/saieb/blog/tasys-shrka-ghwth-llmhamaa-walastsharat-27'
];

foreach ($test_urls as $url) {
    echo "اختبار الرابط: $url<br>";
    $_GET = []; // إعادة تعيين
    $result = extractIdFromUrl($url);
    echo "النتيجة: " . ($result ? 'نجح' : 'فشل') . "<br>";
    if (isset($_GET['id'])) {
        echo "ID المستخرج: " . $_GET['id'] . "<br>";
    }
    echo "<br>";
}
?>