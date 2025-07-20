<?php
include 'db.php';

$tableName = $prefix . "articles";
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if ($id === false) {
    // Handle invalid ID, maybe redirect or show an error
    header("Location: " . BASE_URL . "/404.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM $tableName WHERE ar_type = 4 AND ar_status <> 3 AND ar_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$reult = $stmt->get_result();
$rows = $reult->fetch_assoc();
