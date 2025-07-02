<?php
include 'db.php';

$tableName = $prefix . "library_cat";

$sql = " SELECT * FROM $tableName  where lib_cat_id  = ".$_GET['item'] ;
$reult = $conn->query($sql);
$rows = $reult->fetch_assoc();
