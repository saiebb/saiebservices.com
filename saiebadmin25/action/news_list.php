<?php
include 'db.php';

$tableName = $prefix . "articles";

$sql = " SELECT * FROM $tableName  where ar_type = 4 and  ar_status <> 3 order by ar_id desc";
$reult = $conn->query($sql);
