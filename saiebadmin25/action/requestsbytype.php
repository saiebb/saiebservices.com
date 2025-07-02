<?php
include 'db.php';

$tableName = $prefix . "requests";
$tableName2 = $prefix . "articles";

$latestReqTraining = " SELECT * FROM $tableName r , $tableName2 a where r.req_ser_id =  a.ar_id  and a.ar_type = ". $_GET['type'] ." and r.req_status  <> 3  order by req_id desc  ";

$latestReqTrainingResult = $conn->query($latestReqTraining);