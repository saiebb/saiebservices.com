<?php
include 'db.php';

$tableName = $prefix . "library";
$tableName2 = $prefix . "library_cat";

$sql = " SELECT * FROM $tableName l , $tableName2 c   where  l.lib_cat = c.lib_cat_id  and l.lib_status <> 3 order by lib_id   desc";
$reult = $conn->query($sql);
