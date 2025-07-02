<?php
include 'db.php';

$tableName = $prefix . "requests";
$tableName2 = $prefix . "articles";

// taining
$latestReqTraining = " SELECT * FROM $tableName r , $tableName2 a where r.req_ser_id =  a.ar_id  and a.ar_type = 1 and r.req_status = 1  order by req_id desc limit 3 ";

$latestReqTrainingResult = $conn->query($latestReqTraining);


// business
$latestReqBusiness = " SELECT * FROM $tableName r , $tableName2 a where r.req_ser_id =  a.ar_id  and a.ar_type = 2 and r.req_status = 1  order by req_id desc limit 3 ";
$latestReqBusinessResult = $conn->query($latestReqBusiness);

// indiv
$latestReqIndiv = " SELECT * FROM $tableName r , $tableName2 a where r.req_ser_id =  a.ar_id  and a.ar_type = 3 and r.req_status = 1  order by req_id desc limit 3 ";
$latestReqIndivResult = $conn->query($latestReqIndiv);



// financial
$latestReqFin = " SELECT * FROM $tableName r , $tableName2 a where r.req_ser_id =  a.ar_id  and a.ar_type = 6 and r.req_status = 1  order by req_id desc limit 3 ";
$latestReqFinResult = $conn->query($latestReqFin);