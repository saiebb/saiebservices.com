<?php
include 'db.php';

$tableName = $prefix . "articles";

$sqlLatestClientsoponions = " SELECT * FROM $tableName  where ar_type = 7 and  ar_status <> 3 order by  rand() limit 5";
$reultLatestClientsoponions = $conn->query($sqlLatestClientsoponions);
