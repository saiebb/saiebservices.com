<?php
include 'db.php';

$tableName = $prefix . "library_cat";

$sql = " SELECT * FROM $tableName  where lib_cat_status <> 3 order by lib_cat_id   desc";
$reult = $conn->query($sql);
