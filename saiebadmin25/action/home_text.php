<?php
include 'db.php';

$tableName = $prefix . "home_text";

$sql = "SELECT * FROM $tableName ORDER BY te_id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

} 
?>