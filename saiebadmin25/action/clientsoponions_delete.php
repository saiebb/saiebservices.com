<?php
include 'db.php';
$tableName = $prefix . "articles";

$sql = "update $tableName
set
ar_status = 3  where ar_id =" . $_GET['item'];

if ($conn->query($sql)) {
    header("location:../clientsoponions.php?s=2");
} else {
    header("location:../clientsoponions.php");

}
