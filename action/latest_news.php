<?php
include 'db.php';

$tableName = $prefix . "articles";

$sqlLatestNews = " SELECT * FROM $tableName  where ar_type = 4 and  ar_status <> 3 order by  rand() limit 4";
$reultLatestNews = $conn->query($sqlLatestNews);
