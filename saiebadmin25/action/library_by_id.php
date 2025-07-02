<?php
include 'db.php';

$tableName = $prefix . "library";

$sqlLib = " SELECT * FROM $tableName  where lib_id  = ".$_GET['item'] ;
$reultLib = $conn->query($sqlLib);
$rowsLib = $reultLib->fetch_assoc();
