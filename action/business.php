<?php
include 'db.php';

// إعدادات التصفح
$resultsPerPage = 12; // عدد النتائج في كل صفحة
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // الصفحة الحالية
$startFrom = ($currentPage - 1) * $resultsPerPage; // بداية النتائج في الصفحة الحالية

$tableName = $prefix . "articles";

// استعلام SQL مع التصفح
$sqlBusiness = "SELECT *, ar_slug FROM $tableName WHERE ar_type = 2 AND ar_status = 1 ORDER BY ar_id DESC LIMIT $startFrom, $resultsPerPage";

$reultBusiness = $conn->query($sqlBusiness);

// حساب إجمالي الصفحات
$sqlTotal = "SELECT COUNT(*) FROM $tableName WHERE ar_type = 2 AND ar_status = 1";
$totalResult = $conn->query($sqlTotal);
$totalRows = $totalResult->fetch_row()[0];
$totalPages = ceil($totalRows / $resultsPerPage);
