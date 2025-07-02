<?php
include 'db.php';
$tableName = $prefix . "home_clients";

$sql = "delete from $tableName
 where cli_id =" . $_GET['item'];

if ($conn->query($sql)) {
    header("location:../clients.php?s=2");
} else {
    header("location:../clients.php");

}
