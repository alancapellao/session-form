<?php
session_start();

$host = "localhost";
$dbname = "form";
$user = "root";
$password = "";

global $conn;

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $conn = null;
}
?>