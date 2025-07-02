<?php
include 'db.php';

$tableName = $prefix . "articles";

// Set the number of results per page
$resultsPerPage = 8;

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int) $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $resultsPerPage;

$sqlIndividual = "SELECT * FROM $tableName WHERE  ";
if (isset($_GET['q'])) {
    $sqlIndividual .= "   ( ar_title   LIKE '%" . $_GET['q'] . "%'  AND ar_status = 1 ) Or  ( ar_text LIKE '%" . $_GET['q'] . "%' AND ar_status = 1)  ";
}

$sqlIndividual .= " ORDER BY ar_id DESC LIMIT $resultsPerPage OFFSET $offset";

$resultIndividual = $conn->query($sqlIndividual);

// Assuming you have already executed the query and have the total number of results
$sql22 = "SELECT COUNT(*) as total FROM $tableName WHERE ";
if (isset($_GET['q'])) {
    $sql22 .= "  ( ar_title   LIKE '%" . $_GET['q'] . "%'  AND ar_status = 1 ) Or  ( ar_text LIKE '%" . $_GET['q'] . "%' AND ar_status = 1)";
}

$totalResults = $conn->query($sql22)->fetch_assoc()['total'];
$totalPages = ceil($totalResults / $resultsPerPage);

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int) $_GET['page'];
} else {
    $currentPage = 1;
}
