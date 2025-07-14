<?php
include 'db.php';

$tableName = $prefix . "articles";

// Set the number of results per page
$resultsPerPage = 6;

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $resultsPerPage;

$params = [];
$types = '';
$sqlIndividual = "SELECT * FROM $tableName WHERE ar_type = 4 AND ar_status = 1";
if (isset($_GET['cat']) && is_numeric($_GET['cat'])) {
    $sqlIndividual .= " AND ar_blog_type = ?";
    $params[] = (int)$_GET['cat'];
    $types .= 'i';
}
$sqlIndividual .= " ORDER BY ar_id DESC LIMIT $resultsPerPage OFFSET $offset";

$stmt = $conn->prepare($sqlIndividual);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$resultIndividual = $stmt->get_result();


// Assuming you have already executed the query and have the total number of results
$sql22 =  "SELECT COUNT(*) as total FROM $tableName WHERE ar_type = 4 AND ar_status = 1" ;
if (isset($_GET['cat'])) {
    $sql22 .= " AND ar_blog_type = ?";
}

$stmt2 = $conn->prepare($sql22);
if (!empty($params)) {
    $stmt2->bind_param($types, ...$params);
}
$stmt2->execute();
$totalResults = $stmt2->get_result()->fetch_assoc()['total'];
$totalPages = ceil($totalResults / $resultsPerPage);

// Determine the current page
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}