<?php
include 'db.php';

$tableName = $prefix . "articles";

// تحديد عدد المقالات في كل صفحة
$articlesPerPage = 6;

// حساب الصفحة الحالية
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $articlesPerPage;

// تعديل استعلام SQL لإضافة حدود الصفحات
$sql = "SELECT *, ar_slug FROM $tableName WHERE ar_type = 4   AND ar_status <> 3  ORDER BY ar_id DESC LIMIT $offset, $articlesPerPage";

$reult = $conn->query($sql);

// حساب العدد الإجمالي للمقالات
$totalArticlesSql = "SELECT COUNT(*) as total FROM $tableName WHERE ar_type = 4   AND ar_status <> 3";
$totalArticlesResult = $conn->query($totalArticlesSql);
$totalArticlesRow = $totalArticlesResult->fetch_assoc();
$totalArticles = $totalArticlesRow['total'];

// حساب العدد الإجمالي للصفحات
$totalPages = ceil($totalArticles / $articlesPerPage);
