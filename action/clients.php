<?php
include 'db.php';

$tableName = $prefix . "home_clients";

$sqlClient = " SELECT * FROM $tableName  order by cli_id desc";

$reultClient = $conn->query($sqlClient);
