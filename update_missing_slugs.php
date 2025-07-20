<?php
/**
 * سكريبت تحديث الـ slugs المفقودة في المقالات
 * Script to update missing slugs in articles
 */

include 'action/db.php';
include 'action/base.php';  // إضافة ملف BASE_URL
include 'action/seo_url.php';

echo "<h2>تحديث الـ Slugs المفقودة في المقالات</h2>";

// جلب المقالات التي لا تحتوي على slug أو تحتوي على slug فارغ
$sql = "SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_type = 4 AND ar_status = 1 AND (ar_slug IS NULL OR ar_slug = '' OR ar_slug = 'article')";
$result = $conn->query($sql);

$updated_count = 0;
$total_count = $result->num_rows;

echo "<p>تم العثور على <strong>$total_count</strong> مقال يحتاج إلى تحديث الـ slug</p>";

if ($total_count > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
    echo "<tr style='background-color: #f0f0f0;'><th>ID</th><th>العنوان</th><th>Slug القديم</th><th>Slug الجديد</th><th>الحالة</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        $id = $row['ar_id'];
        $title = $row['ar_title'];
        $old_slug = $row['ar_slug'];
        
        // إنشاء slug جديد من العنوان
        $new_slug = slugify($title);
        
        // إذا كان الـ slug المولد فارغاً، استخدم قيمة افتراضية
        if (empty($new_slug)) {
            $new_slug = "article-" . $id;
        }
        
        // تحديث قاعدة البيانات
        $updateStmt = $conn->prepare("UPDATE sa_articles SET ar_slug = ? WHERE ar_id = ?");
        $updateStmt->bind_param('si', $new_slug, $id);
        
        if ($updateStmt->execute()) {
            $status = "<span style='color: green;'>✅ تم التحديث</span>";
            $updated_count++;
        } else {
            $status = "<span style='color: red;'>❌ فشل التحديث</span>";
        }
        
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>" . htmlspecialchars($title) . "</td>";
        echo "<td>" . htmlspecialchars($old_slug) . "</td>";
        echo "<td>" . htmlspecialchars($new_slug) . "</td>";
        echo "<td>$status</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    echo "<div style='background-color: #d4edda; border: 1px solid #c3e6cb; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
    echo "<h3 style='color: #155724; margin: 0 0 10px 0;'>ملخص النتائج:</h3>";
    echo "<p style='margin: 5px 0;'>إجمالي المقالات المعالجة: <strong>$total_count</strong></p>";
    echo "<p style='margin: 5px 0;'>المقالات المحدثة بنجاح: <strong>$updated_count</strong></p>";
    echo "<p style='margin: 5px 0;'>المقالات الفاشلة: <strong>" . ($total_count - $updated_count) . "</strong></p>";
    echo "</div>";
    
} else {
    echo "<div style='background-color: #d1ecf1; border: 1px solid #bee5eb; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
    echo "<p style='color: #0c5460; margin: 0;'>✅ جميع المقالات تحتوي على slugs صحيحة!</p>";
    echo "</div>";
}

// اختبار بعض الروابط بعد التحديث
echo "<h3>اختبار الروابط بعد التحديث:</h3>";

$test_ids = [97, 23, 28, 27]; // المقالات التي كانت تواجه مشاكل
foreach ($test_ids as $test_id) {
    $stmt = $conn->prepare("SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_id = ?");
    $stmt->bind_param('i', $test_id);
    $stmt->execute();
    $test_result = $stmt->get_result();
    
    if ($test_row = $test_result->fetch_assoc()) {
        $test_url = getBlogUrl($test_row['ar_id'], $test_row['ar_title'], $test_row['ar_slug']);
        echo "<p>المقال رقم $test_id: <a href='$test_url' target='_blank'>$test_url</a></p>";
    }
}

echo "<div style='background-color: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; margin: 20px 0; border-radius: 5px;'>";
echo "<h4 style='color: #856404; margin: 0 0 10px 0;'>⚠️ تعليمات مهمة:</h4>";
echo "<ul style='margin: 0; color: #856404;'>";
echo "<li>تأكد من اختبار الروابط الجديدة للتأكد من عملها</li>";
echo "<li>يمكنك حذف هذا الملف بعد التأكد من نجاح العملية</li>";
echo "<li>تم حفظ الـ slugs الجديدة في قاعدة البيانات تلقائياً</li>";
echo "</ul>";
echo "</div>";

$conn->close();
?>