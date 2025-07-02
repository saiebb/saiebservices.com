<?php
include 'db.php';

$tableName1 = $prefix . "articles";
$tableName2 = $prefix . "articles_cat";
$sql = " SELECT * FROM $tableName1 a , $tableName2 c  where a.ar_cat = c.ar_cat_id and  a.ar_type = 3 and  a.ar_status <> 3 order by a.ar_id desc";
$reult = $conn->query($sql);
