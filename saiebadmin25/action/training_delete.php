<?php
include 'db.php';
$tableName = $prefix . "articles";

$sql = "update $tableName
set
ar_status = 3  where ar_id =" . $_GET['item'];

if ($conn->query($sql)) {
    header("location:../training.php?s=2");
} else {
    header("location:../training.php");

}
