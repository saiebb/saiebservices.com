<?php
// فحص البيانات في قاعدة البيانات
include 'action/db.php';

$tableName = $prefix . "articles";

echo "<h1>فحص البيانات - خدمات الأفراد</h1>";

// فحص العدد الكلي للمقالات من نوع 3 (خدمات الأفراد)
$sql = "SELECT COUNT(*) as total FROM $tableName WHERE ar_type = 3 AND ar_status = 1";
$result = $conn->query($sql);

if ($result) {
    $total = $result->fetch_assoc()['total'];
    echo "<p>العدد الكلي لخدمات الأفراد النشطة: <strong>$total</strong></p>";
    
    if ($total > 0) {
        $resultsPerPage = 16;
        $totalPages = ceil($total / $resultsPerPage);
        echo "<p>عدد النتائج لكل صفحة: $resultsPerPage</p>";
        echo "<p>العدد الكلي للصفحات: <strong>$totalPages</strong></p>";
        
        if ($totalPages > 1) {
            echo "<p style='color: green;'>✅ يجب أن يعمل التصفح (أكثر من صفحة واحدة)</p>";
        } else {
            echo "<p style='color: orange;'>⚠️ صفحة واحدة فقط - لن تظهر أزرار التصفح</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ لا توجد بيانات - لن يعمل التصفح</p>";
    }
} else {
    echo "<p style='color: red;'>خطأ في الاستعلام: " . $conn->error . "</p>";
}

// عرض بعض البيانات النموذجية
echo "<h2>عينة من البيانات:</h2>";
$sql2 = "SELECT ar_id, ar_title, ar_type, ar_status FROM $tableName WHERE ar_type = 3 ORDER BY ar_id DESC LIMIT 10";
$result2 = $conn->query($sql2);

if ($result2 && $result2->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>ID</th><th>العنوان</th><th>النوع</th><th>الحالة</th></tr>";
    
    while ($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ar_id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['ar_title']) . "</td>";
        echo "<td>" . $row['ar_type'] . "</td>";
        echo "<td>" . ($row['ar_status'] == 1 ? 'نشط' : 'غير نشط') . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "<p>لا توجد بيانات للعرض</p>";
}

// فحص جدول قاعدة البيانات
echo "<h2>معلومات الجدول:</h2>";
$sql3 = "DESCRIBE $tableName";
$result3 = $conn->query($sql3);

if ($result3) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>اسم العمود</th><th>النوع</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    
    while ($row = $result3->fetch_assoc()) {
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
?>