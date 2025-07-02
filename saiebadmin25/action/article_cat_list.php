<?php
include 'db.php';

$tableName = $prefix . "articles_cat";

$sql = " SELECT * FROM $tableName  where ar_cat_status <> 3 order by ar_cat_id    desc";
$reult = $conn->query($sql);
