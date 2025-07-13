<?php
// ملف تصحيح لفحص مشكلة التصفح في صفحة الخدمات الفردية
include 'action/db.php';

echo "<h1>تصحيح مشكلة التصفح - خدمات الأفراد</h1>";

// عرض المعاملات المرسلة
echo "<h2>المعاملات المرسلة:</h2>";
echo "<pre>";
print_r($_GET);
echo "</pre>";

$tableName = $prefix . "articles";

// Set the number of results per page
$resultsPerPage = 16;

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

echo "<h2>معلومات التصفح:</h2>";
echo "الصفحة الحالية: $currentPage<br>";
echo "النتائج لكل صفحة: $resultsPerPage<br>";

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $resultsPerPage;
echo "الإزاحة: $offset<br>";

$sqlIndividual = "SELECT * FROM $tableName WHERE ar_type = 3 AND ar_status = 1";
if (isset($_GET['cat'])) {
    $sqlIndividual .= " AND ar_cat = " . $_GET['cat'];
}
$sqlIndividual .= " ORDER BY ar_id DESC LIMIT $resultsPerPage OFFSET $offset";

echo "<h2>استعلام البيانات:</h2>";
echo "<pre>$sqlIndividual</pre>";

$resultIndividual = $conn->query($sqlIndividual);

if ($resultIndividual) {
    echo "عدد النتائج في الصفحة الحالية: " . $resultIndividual->num_rows . "<br>";
} else {
    echo "خطأ في الاستعلام: " . $conn->error . "<br>";
}

// Get total count
$sql22 = "SELECT COUNT(*) as total FROM $tableName WHERE ar_type = 3 AND ar_status = 1";
if (isset($_GET['cat'])) {
    $sql22 .= " AND ar_cat = " . $_GET['cat'];
}

echo "<h2>استعلام العدد الكلي:</h2>";
echo "<pre>$sql22</pre>";

$totalResult = $conn->query($sql22);
if ($totalResult) {
    $totalResults = $totalResult->fetch_assoc()['total'];
    $totalPages = ceil($totalResults / $resultsPerPage);
    
    echo "العدد الكلي للنتائج: $totalResults<br>";
    echo "العدد الكلي للصفحات: $totalPages<br>";
} else {
    echo "خطأ في استعلام العدد: " . $conn->error . "<br>";
}

// عرض روابط التصفح
echo "<h2>روابط التصفح:</h2>";
$catParam = isset($_GET['cat']) ? '&cat=' . $_GET['cat'] : '';

echo '<ul style="list-style: none; padding: 0;">';

// زر السابق
if ($currentPage > 1) {
    $prevPage = $currentPage - 1;
    echo '<li style="display: inline-block; margin: 5px;"><a href="?page=' . $prevPage . $catParam . '" style="padding: 10px; background: #007bff; color: white; text-decoration: none;">السابق (صفحة ' . $prevPage . ')</a></li>';
}

// أرقام الصفحات
for ($i = 1; $i <= $totalPages; $i++) {
    $style = ($i == $currentPage) ? 'background: #28a745; color: white;' : 'background: #f8f9fa; color: #007bff;';
    echo '<li style="display: inline-block; margin: 5px;"><a href="?page=' . $i . $catParam . '" style="padding: 10px; ' . $style . ' text-decoration: none; border: 1px solid #dee2e6;">' . $i . '</a></li>';
}

// زر التالي
if ($currentPage < $totalPages) {
    $nextPage = $currentPage + 1;
    echo '<li style="display: inline-block; margin: 5px;"><a href="?page=' . $nextPage . $catParam . '" style="padding: 10px; background: #007bff; color: white; text-decoration: none;">التالي (صفحة ' . $nextPage . ')</a></li>';
}

echo '</ul>';

echo "<h2>الرابط الحالي:</h2>";
echo $_SERVER['REQUEST_URI'];
?>