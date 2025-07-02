<?php
include 'db.php';

$tableName = $prefix . "library_cat";
// Number of results per page
$resultsPerPage = 9;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting row for the query
$startFrom = ($page - 1) * $resultsPerPage;

// Modify the SQL query to use LIMIT and OFFSET
$sql = "SELECT * FROM $tableName where lib_cat_status = 1 ORDER BY lib_cat_id DESC LIMIT $startFrom, $resultsPerPage";

$result = $conn->query($sql);

// Calculate the total number of pages
$totalResults = $conn->query("SELECT COUNT(*) AS total FROM $tableName")->fetch_assoc()['total'];
$totalPages = ceil($totalResults / $resultsPerPage);