<?php
include 'db.php';

$tableName = $prefix . "articles";

$sql = " SELECT * FROM $tableName  where ar_type = 4 and  ar_status <> 3 and ar_id  = " . $_GET['id']; ;
$reult = $conn->query($sql);
$rows = $reult->fetch_assoc();
