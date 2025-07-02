<?php
include 'db.php';
$tableName = $prefix . "library_cat";

$sql = "update $tableName
set
lib_cat_status = 3  where lib_cat_id =" . $_GET['item'];

if ($conn->query($sql)) {
    header("location:../library-cat.php?s=2");
} else {
    header("location:../library-cat.php");

}
