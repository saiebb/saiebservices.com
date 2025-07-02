<?php
include 'db.php';

$tableName = $prefix . "home_text";

$sqlText = "SELECT * FROM $tableName ORDER BY te_id ASC";
$resultText = $conn->query($sqlText);

if ($resultText->num_rows > 0) {
    $rowsText = [];
    while ($rowText = $resultText->fetch_assoc()) {
        $rowsText[] = $rowText;
    }

} 
?>