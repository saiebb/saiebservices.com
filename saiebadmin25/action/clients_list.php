<?php
include 'db.php';

$tableName = $prefix . "home_clients";

$sql = " SELECT * FROM $tableName  order by cli_id   desc";
$reult = $conn->query($sql);
