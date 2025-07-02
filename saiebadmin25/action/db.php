<?php

$servername = "localhost";
$username = "saiebser_saiebservices";
$password = "GXim4t#RBoJg";
$dbName = "saiebser_saiebservices";
$prefix = "sa_";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
$conn->query("set names utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
