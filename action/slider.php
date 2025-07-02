<?php
include 'db.php';

$tableName = $prefix . "home_slider";

$sqlSlider = " SELECT * FROM $tableName  order by sl_id desc";
$reultSlider = $conn->query($sqlSlider);
