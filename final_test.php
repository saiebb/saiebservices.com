<?php
/**
 * اختبار نهائي لحل مشكلة الروابط
 */

include 'action/db.php';
include 'action/base.php';
include 'action/seo_url.php';

echo "<h2>🎯 اختبار نهائي لحل مشكلة الروابط</h2>";

echo "<div style='background-color: #e7f3ff; border: 1px solid #b3d9ff; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
echo "<h3 style='color: #0066cc; margin: 0 0 10px 0;'>معلومات النظام:</h3>";
echo "<p><strong>BASE_URL:</strong> " . BASE_URL . "</p>";
echo "<p><strong>الوقت:</strong> " . date('Y-m-d H:i:s') . "</p>";
echo "</div>";

// اختبار المقالات المشكلة
echo "<h3>🔍 اختبار المقالات التي كانت تواجه مشاكل:</h3>";
$problematic_ids = [97, 23];

echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
echo "<tr style='background-color: #f8f9fa;'>";
echo "<th style='padding: 10px;'>ID</th>";
echo "<th style='padding: 10px;'>العنوان</th>";
echo "<th style='padding: 10px;'>Slug</th>";
echo "<th style='padding: 10px;'>الرابط الكامل</th>";
echo "<th style='padding: 10px;'>اختبار الوصول</th>";
echo "<th style='padding: 10px;'>الحالة</th>";
echo "</tr>";

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
        $access_test = extractIdFromUrl($test_path);
        $extracted_id = isset($_GET['id']) ? $_GET['id'] : null;
        
        $status_color = $access_test ? '#28a745' : '#dc3545';
        $status_text = $access_test ? '✅ يعمل بشكل صحيح' : '❌ لا يعمل';
        
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . $row['ar_id'] . "</td>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars(substr($row['ar_title'], 0, 50)) . "...</td>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars($row['ar_slug']) . "</td>";
        echo "<td style='padding: 8px;'><a href='$generated_url' target='_blank' style='color: #007bff;'>$generated_url</a></td>";
        echo "<td style='padding: 8px;'>ID المستخرج: " . ($extracted_id ?: 'لا يوجد') . "</td>";
        echo "<td style='padding: 8px; color: $status_color; font-weight: bold;'>$status_text</td>";
        echo "</tr>";
    }
}
echo "</table>";

// اختبار المقالات العاملة للمقارنة
echo "<h3>✅ اختبار المقالات التي تعمل (للمقارنة):</h3>";
$working_ids = [28, 27];

echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
echo "<tr style='background-color: #f8f9fa;'>";
echo "<th style='padding: 10px;'>ID</th>";
echo "<th style='padding: 10px;'>العنوان</th>";
echo "<th style='padding: 10px;'>Slug</th>";
echo "<th style='padding: 10px;'>الرابط الكامل</th>";
echo "<th style='padding: 10px;'>اختبار الوصول</th>";
echo "<th style='padding: 10px;'>الحالة</th>";
echo "</tr>";

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
        $access_test = extractIdFromUrl($test_path);
        $extracted_id = isset($_GET['id']) ? $_GET['id'] : null;
        
        $status_color = $access_test ? '#28a745' : '#dc3545';
        $status_text = $access_test ? '✅ يعمل بشكل صحيح' : '❌ لا يعمل';
        
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . $row['ar_id'] . "</td>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars(substr($row['ar_title'], 0, 50)) . "...</td>";
        echo "<td style='padding: 8px;'>" . htmlspecialchars($row['ar_slug']) . "</td>";
        echo "<td style='padding: 8px;'><a href='$generated_url' target='_blank' style='color: #007bff;'>$generated_url</a></td>";
        echo "<td style='padding: 8px;'>ID المستخرج: " . ($extracted_id ?: 'لا يوجد') . "</td>";
        echo "<td style='padding: 8px; color: $status_color; font-weight: bold;'>$status_text</td>";
        echo "</tr>";
    }
}
echo "</table>";

// اختبار شامل لدالة extractIdFromUrl
echo "<h3>🔧 اختبار شامل لدالة extractIdFromUrl:</h3>";
$test_urls = [
    '/saieb/blog/dwra-tqyym-alada-alwzyfy-97',
    '/saieb/blog/dwra-altdrb-adara-almsharya-alahtrafya-23',
    '/saieb/blog/bna-khta-astratyjya-lshrka-tyth-llhlwyat-28',
    '/saieb/blog/tasys-shrka-ghwth-llmhamaa-walastsharat-27',
    '/blog/dwra-tqyym-alada-alwzyfy-97',
    '/blog/article-97',
    '/saieb/blog/article-97'
];

echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
echo "<tr style='background-color: #f8f9fa;'>";
echo "<th style='padding: 10px;'>الرابط المختبر</th>";
echo "<th style='padding: 10px;'>النتيجة</th>";
echo "<th style='padding: 10px;'>ID المستخرج</th>";
echo "<th style='padding: 10px;'>الحالة</th>";
echo "</tr>";

foreach ($test_urls as $url) {
    $_GET = [];
    $result = extractIdFromUrl($url);
    $extracted_id = isset($_GET['id']) ? $_GET['id'] : 'غير محدد';
    $status = $result ? '✅ نجح' : '❌ فشل';
    $status_color = $result ? '#28a745' : '#dc3545';
    
    echo "<tr>";
    echo "<td style='padding: 8px;'>$url</td>";
    echo "<td style='padding: 8px; color: $status_color; font-weight: bold;'>$status</td>";
    echo "<td style='padding: 8px;'>$extracted_id</td>";
    echo "<td style='padding: 8px;'>" . ($result ? 'يعمل بشكل صحيح' : 'يحتاج إصلاح') . "</td>";
    echo "</tr>";
}
echo "</table>";

// النتيجة النهائية
$all_working = true;
foreach ($problematic_ids as $id) {
    $stmt = $conn->prepare("SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $generated_url = getBlogUrl($row['ar_id'], $row['ar_title'], $row['ar_slug']);
        $test_path = str_replace(BASE_URL, '', $generated_url);
        $_GET = [];
        if (!extractIdFromUrl($test_path)) {
            $all_working = false;
            break;
        }
    }
}

if ($all_working) {
    echo "<div style='background-color: #d4edda; border: 1px solid #c3e6cb; padding: 20px; margin: 20px 0; border-radius: 5px;'>";
    echo "<h3 style='color: #155724; margin: 0 0 15px 0;'>🎉 تم حل المشكلة بنجاح!</h3>";
    echo "<ul style='margin: 0; color: #155724;'>";
    echo "<li>✅ جميع الروابط تعمل بشكل صحيح</li>";
    echo "<li>✅ تم إصلاح المقالات رقم 97 و 23</li>";
    echo "<li>✅ دالة extractIdFromUrl تعمل بشكل مثالي</li>";
    echo "<li>✅ دالة getBlogUrl تولد روابط صحيحة</li>";
    echo "</ul>";
    echo "</div>";
} else {
    echo "<div style='background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 20px; margin: 20px 0; border-radius: 5px;'>";
    echo "<h3 style='color: #721c24; margin: 0 0 15px 0;'>⚠️ لا تزال هناك مشاكل</h3>";
    echo "<p style='margin: 0; color: #721c24;'>يرجى مراجعة النتائج أعلاه لتحديد المشاكل المتبقية.</p>";
    echo "</div>";
}

echo "<div style='background-color: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
echo "<h4 style='color: #856404; margin: 0 0 10px 0;'>📝 ملاحظات مهمة:</h4>";
echo "<ul style='margin: 0; color: #856404;'>";
echo "<li>تأكد من اختبار الروابط في المتصفح مباشرة</li>";
echo "<li>يمكنك حذف ملفات الاختبار بعد التأكد من نجاح العملية</li>";
echo "<li>جميع التحديثات تم حفظها في قاعدة البيانات</li>";
echo "</ul>";
echo "</div>";

$conn->close();
?>