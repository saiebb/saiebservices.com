<?php
include 'db.php';

$tableName = $prefix . "requests";
$tableName2 = $prefix . "articles";

$requetsSql = " SELECT * FROM $tableName r , $tableName2 a where r.req_ser_id =  a.ar_id  and r.req_id =  " . $_GET['item']    ;

$requetsResult = $conn->query($requetsSql);
$rows = $requetsResult->fetch_assoc();