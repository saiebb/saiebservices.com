<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "library_cat";
$lib_cat_name = strip_tags($_POST['lib_cat_name']);


// check if email already exist


$sql = "INSERT INTO $tableName
    ( `lib_cat_name`,`lib_cat_status`)
    VALUES
    ( '$lib_cat_name' ,  '1');";

if ($conn->query($sql)) {
    header("location:../library-cat.php?s=1");
} else {
    header("location:../library-cat-add.php?e=1");

}
