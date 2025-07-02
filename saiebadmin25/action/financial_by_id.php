<?php
include 'db.php';

$tableName = $prefix . "articles";

$sql = " SELECT * FROM $tableName  where ar_id  = ".$_GET['item'] ;
$reult = $conn->query($sql);
$rows = $reult->fetch_assoc();
