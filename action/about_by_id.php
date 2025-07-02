<?php
include 'db.php';

$tableName = $prefix . "about";

$sql = " SELECT * FROM $tableName  where ab_id  = 1" ;
$reult = $conn->query($sql);
$rows = $reult->fetch_assoc();
