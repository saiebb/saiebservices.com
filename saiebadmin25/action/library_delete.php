<?php
include 'db.php';
$tableName = $prefix . "library";

$sql = "update $tableName
set
lib_status = 3  where lib_id =" . $_GET['item'];

if ($conn->query($sql)) {
    header("location:../library.php?s=2");
} else {
    header("location:../library.php");

}
