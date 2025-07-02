<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "articles_cat";
$ar_cat_name = strip_tags($_POST['ar_cat_name']);


// check if email already exist


$sql = "INSERT INTO $tableName
    ( `ar_cat_name`,`ar_cat_status`)
    VALUES
    ( '$ar_cat_name' ,  '1');";

if ($conn->query($sql)) {
    header("location:../article-cat.php?s=1");
} else {
    header("location:../article-cat-add.php?e=1");

}
