<?php
include 'db.php';

$tableName = $prefix . "articles";

$sqlServ = " SELECT * FROM $tableName  where ar_id  = ".$_GET['item'] ;
$reultServ = $conn->query($sqlServ);
$rowsServ = $reultServ->fetch_assoc();
