<?php
include 'db.php';

$tableName = $prefix . "articles_cat";

$sql = " SELECT * FROM $tableName  where ar_cat_id  = ".$_GET['item'] ;
$reult = $conn->query($sql);
$rows = $reult->fetch_assoc();
