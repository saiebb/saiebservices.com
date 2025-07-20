<?php
/**
 * سكريبت اختبار شامل لروابط SEO
 * Comprehensive SEO URLs testing script
 */

include 'action/db.php';
include 'action/base.php';  // إضافة ملف BASE_URL
include 'action/seo_url.php';

echo "<h2>اختبار شامل لروابط SEO</h2>";

// اختبار 1: فحص BASE_URL
echo "<h3>1. فحص BASE_URL:</h3>";
echo "<p>BASE_URL: <strong>" . BASE_URL . "</strong></p>";

// اختبار 2: فحص دالة extractIdFromUrl
echo "<h3>2. اختبار دالة extractIdFromUrl:</h3>";
$test_urls = [
    '/saieb/blog/article-97',
    '/saieb/blog/article-23',
    '/saieb/blog/bna-khta-astratyjya-lshrka-tyth-llhlwyat-28',
    '/saieb/blog/tasys-shrka-ghwth-llmhamaa-walastsharat-27',
    '/blog/article-97',
    '/blog/article-23'
];

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #f0f0f0;'><th>الرابط المختبر</th><th>النتيجة</th><th>ID المستخرج</th></tr>";

foreach ($test_urls as $url) {
    // إعادة تعيين $_GET
    $_GET = [];
    
    $result = extractIdFromUrl($url);
    $extracted_id = isset($_GET['id']) ? $_GET['id'] : 'غير محدد';
    $status = $result ? '✅ نجح' : '❌ فشل';
    
    echo "<tr>";
    echo "<td>$url</td>";
    echo "<td>$status</td>";
    echo "<td>$extracted_id</td>";
    echo "</tr>";
}
echo "</table>";

// اختبار 3: فحص المقالات المشكلة
echo "<h3>3. فحص المقالات التي كانت تواجه مشاكل:</h3>";
$problematic_ids = [97, 23];

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #f0f0f0;'><th>ID</th><th>العنوان</th><th>Slug</th><th>الرابط المولد</th><th>اختبار الوصول</th></tr>";

foreach ($problematic_ids as $id) {
    $stmt = $conn->prepare("SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $generated_url = getBlogUrl($row['ar_id'], $row['ar_title'], $row['ar_slug']);
        
        // اختبار الوصول للرابط
        $test_path = str_replace(BASE_URL, '', $generated_url);
        $_GET = [];
        $access_test = extractIdFromUrl($test_path) ? '✅ يعمل' : '❌ لا يعمل';
        
        echo "<tr>";
        echo "<td>" . $row['ar_id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['ar_title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ar_slug']) . "</td>";
        echo "<td><a href='$generated_url' target='_blank'>$generated_url</a></td>";
        echo "<td>$access_test</td>";
        echo "</tr>";
    }
}
echo "</table>";

// اختبار 4: فحص عينة من المقالات العاملة
echo "<h3>4. فحص عينة من المقالات العاملة:</h3>";
$working_ids = [28, 27];

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #f0f0f0;'><th>ID</th><th>العنوان</th><th>Slug</th><th>الرابط المولد</th><th>اختبار الوصول</th></tr>";

foreach ($working_ids as $id) {
    $stmt = $conn->prepare("SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $generated_url = getBlogUrl($row['ar_id'], $row['ar_title'], $row['ar_slug']);
        
        // اختبار الوصول للرابط
        $test_path = str_replace(BASE_URL, '', $generated_url);
        $_GET = [];
        $access_test = extractIdFromUrl($test_path) ? '✅ يعمل' : '❌ لا يعمل';
        
        echo "<tr>";
        echo "<td>" . $row['ar_id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['ar_title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ar_slug']) . "</td>";
        echo "<td><a href='$generated_url' target='_blank'>$generated_url</a></td>";
        echo "<td>$access_test</td>";
        echo "</tr>";
    }
}
echo "</table>";

// اختبار 5: فحص دالة slugify
echo "<h3>5. اختبار دالة slugify:</h3>";
$test_titles = [
    'بناء خطة استراتيجية للشركة تيث للحلويات',
    'تأسيس شركة غوث للمحاماة والاستشارات',
    'خدمات الاستشارات المالية',
    'برنامج تدريبي متقدم'
];

echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #f0f0f0;'><th>العنوان الأصلي</th><th>Slug المولد</th></tr>";

foreach ($test_titles as $title) {
    $slug = slugify($title);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($title) . "</td>";
    echo "<td>" . htmlspecialchars($slug) . "</td>";
    echo "</tr>";
}
echo "</table>";

// ملخص النتائج
echo "<div style='background-color: #d4edda; border: 1px solid #c3e6cb; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
echo "<h3 style='color: #155724; margin: 0 0 10px 0;'>ملخص الاختبار:</h3>";
echo "<p style='margin: 5px 0;'>✅ تم اختبار جميع الوظائف الأساسية</p>";
echo "<p style='margin: 5px 0;'>✅ تم التحقق من BASE_URL</p>";
echo "<p style='margin: 5px 0;'>✅ تم اختبار دالة extractIdFromUrl</p>";
echo "<p style='margin: 5px 0;'>✅ تم اختبار دالة getBlogUrl</p>";
echo "<p style='margin: 5px 0;'>✅ تم اختبار دالة slugify</p>";
echo "</div>";

$conn->close();
?>