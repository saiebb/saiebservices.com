<?php
/**
 * سكريبت تحديث المقالات الموجودة بـ Slug
 * يقوم بتوليد slug للمقالات التي ليس لها slug
 */

include 'action/db.php';
include 'action/seo_url.php';

echo "=== بدء عملية تحديث المقالات بـ Slug ===\n\n";

// جلب المقالات التي ليس لها slug
$query = "SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_slug IS NULL OR ar_slug = '' ORDER BY ar_id";
$result = $conn->query($query);

if (!$result) {
    die("خطأ في الاستعلام: " . $conn->error . "\n");
}

$total_articles = $result->num_rows;
echo "عدد المقالات التي تحتاج إلى slug: $total_articles\n\n";

if ($total_articles == 0) {
    echo "جميع المقالات لديها slug بالفعل!\n";
    exit;
}

$updated_count = 0;
$errors = [];

while ($row = $result->fetch_assoc()) {
    $id = $row['ar_id'];
    $title = $row['ar_title'];
    $current_slug = $row['ar_slug'];
    
    echo "معالجة المقال ID: $id\n";
    echo "العنوان: $title\n";
    
    // توليد slug من العنوان
    $new_slug = slugify($title);
    echo "Slug المولد: $new_slug\n";
    
    // التحقق من عدم تكرار الـ slug
    $check_query = "SELECT ar_id FROM sa_articles WHERE ar_slug = ? AND ar_id != ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("si", $new_slug, $id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if ($check_result->num_rows > 0) {
        // إذا كان الـ slug موجود، أضف رقم المقال في النهاية
        $new_slug = $new_slug . '-' . $id;
        echo "تم تعديل الـ slug لتجنب التكرار: $new_slug\n";
    }
    
    // تحديث المقال بالـ slug الجديد
    $update_query = "UPDATE sa_articles SET ar_slug = ? WHERE ar_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("si", $new_slug, $id);
    
    if ($update_stmt->execute()) {
        echo "✅ تم التحديث بنجاح\n";
        $updated_count++;
    } else {
        $error_msg = "❌ خطأ في تحديث المقال ID: $id - " . $conn->error;
        echo $error_msg . "\n";
        $errors[] = $error_msg;
    }
    
    echo "---\n";
}

echo "\n=== ملخص العملية ===\n";
echo "إجمالي المقالات المعالجة: $total_articles\n";
echo "المقالات المحدثة بنجاح: $updated_count\n";
echo "الأخطاء: " . count($errors) . "\n";

if (!empty($errors)) {
    echo "\nتفاصيل الأخطاء:\n";
    foreach ($errors as $error) {
        echo "- $error\n";
    }
}

echo "\n=== انتهت العملية ===\n";

// عرض عينة من النتائج
echo "\nعينة من المقالات المحدثة:\n";
$sample_query = "SELECT ar_id, ar_title, ar_slug FROM sa_articles WHERE ar_slug IS NOT NULL AND ar_slug != '' ORDER BY ar_id DESC LIMIT 5";
$sample_result = $conn->query($sample_query);

while ($row = $sample_result->fetch_assoc()) {
    echo "ID: {$row['ar_id']} - العنوان: {$row['ar_title']} - Slug: {$row['ar_slug']}\n";
}

$conn->close();
?>