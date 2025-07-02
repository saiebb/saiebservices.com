<?php
include 'db.php';

$tableName = $prefix . "library";
$tableName2 = $prefix . "library_cat";
// Number of results per page
$resultsPerPage = 9;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting row for the query
$startFrom = ($page - 1) * $resultsPerPage;

// Modify the SQL query to use LIMIT and OFFSET

// get Category name
$sql2 = "SELECT * FROM $tableName2 where lib_cat_id = ".$_GET['cat']." " ;
$result2 = $conn->query($sql2);
$rowName= $result2->fetch_assoc() ;


$sql = "SELECT * FROM $tableName l , $tableName2 c where l.lib_cat = c.lib_cat_id and l.lib_cat = ".$_GET['cat']." and l.lib_status = 1 ORDER BY lib_id DESC LIMIT $startFrom, $resultsPerPage" ;
$result = $conn->query($sql);

// Calculate the total number of pages
$totalResults = $conn->query("SELECT COUNT(*) AS total  FROM $tableName l , $tableName2 c where l.lib_cat = c.lib_cat_id and l.lib_cat = ".$_GET['cat']." and l.lib_status = 1  ")->fetch_assoc()['total'];
$totalPages = ceil($totalResults / $resultsPerPage);