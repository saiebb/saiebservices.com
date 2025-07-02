<?php
include 'db.php';

$tableName = $prefix . "articles_cat";

$sqlindCat = " SELECT * FROM $tableName  where ar_cat_status = 1   order by  ar_cat_id  ASC";
$reultindCat = $conn->query($sqlindCat);
