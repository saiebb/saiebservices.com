<?php
include 'db.php';

$tableName = $prefix . "contact";

$sql = " SELECT * FROM $tableName  where con_id  = 1" ;
$reult = $conn->query($sql);
$rows = $reult->fetch_assoc();
