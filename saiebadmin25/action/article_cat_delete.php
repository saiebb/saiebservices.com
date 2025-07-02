<?php
include 'db.php';
$tableName = $prefix . "articles_cat";

$sql = "update $tableName
set
ar_cat_status = 3  where ar_cat_id =" . $_GET['item'];

if ($conn->query($sql)) {
    header("location:../article-cat.php?s=2");
} else {
    header("location:../article-cat.php?e=1");

}
