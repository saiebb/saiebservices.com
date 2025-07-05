<?php
/**
 * إضافة عمود موافقة Google Customer Reviews إلى جدول الطلبات
 * Add Google Customer Reviews consent column to requests table
 */

include 'action/db.php';

echo "<h2>إضافة دعم Google Customer Reviews</h2>";
echo "<hr>";

try {
    $tableName = $prefix . "requests";
    
    // التحقق من وجود العمود
    $checkColumn = "SHOW COLUMNS FROM $tableName LIKE 'google_reviews_consent'";
    $result = $conn->query($checkColumn);
    
    if ($result->num_rows == 0) {
        echo "<p>إضافة عمود موافقة Google Customer Reviews...</p>";
        
        // إضافة العمود
        $addColumn = "ALTER TABLE $tableName 
                     ADD COLUMN google_reviews_consent TINYINT(1) DEFAULT 0 COMMENT 'موافقة العميل على آراء Google'";
        
        if ($conn->query($addColumn)) {
            echo "<p style='color: green;'>✓ تم إضافة عمود google_reviews_consent بنجاح</p>";
        } else {
            echo "<p style='color: red;'>✗ خطأ في إضافة العمود: " . $conn->error . "</p>";
        }
        
    } else {
        echo "<p style='color: blue;'>ℹ عمود google_reviews_consent موجود بالفعل</p>";
    }
    
    // عرض هيكل الجدول الحالي
    echo "<h3>هيكل جدول الطلبات الحالي:</h3>";
    $showColumns = "SHOW COLUMNS FROM $tableName";
    $result = $conn->query($showColumns);
    
    if ($result->num_rows > 0) {
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th>اسم العمود</th><th>النوع</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    // عرض إحصائيات الطلبات
    echo "<h3>إحصائيات الطلبات:</h3>";
    $stats = "SELECT 
                COUNT(*) as total_requests,
                COUNT(CASE WHEN google_reviews_consent = 1 THEN 1 END) as consented_requests,
                COUNT(CASE WHEN google_reviews_consent = 0 THEN 1 END) as non_consented_requests
              FROM $tableName";
    
    $result = $conn->query($stats);
    if ($result && $row = $result->fetch_assoc()) {
        echo "<ul>";
        echo "<li><strong>إجمالي الطلبات:</strong> " . $row['total_requests'] . "</li>";
        echo "<li><strong>الطلبات التي وافقت على Google Reviews:</strong> " . $row['consented_requests'] . "</li>";
        echo "<li><strong>الطلبات التي لم توافق:</strong> " . $row['non_consented_requests'] . "</li>";
        echo "</ul>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>خطأ: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h3>الخطوات التالية:</h3>";
echo "<ol>";
echo "<li>تأكد من الحصول على معرف التاجر من <a href='https://merchants.google.com/' target='_blank'>Google Merchant Center</a></li>";
echo "<li>استبدل معرف التاجر في ملف footer.php (السطر الذي يحتوي على merchant_id)</li>";
echo "<li>اختبر النظام بإرسال طلب جديد مع تفعيل خيار Google Reviews</li>";
echo "<li>يمكنك حذف هذا الملف بعد التأكد من نجاح التحديث</li>";
echo "</ol>";

echo "<p><a href='index.php'>العودة للموقع</a></p>";
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
table { margin: 10px 0; }
th, td { padding: 8px; text-align: left; }
th { background-color: #f2f2f2; }
</style>