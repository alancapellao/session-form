<?php
session_start();

$config = parse_ini_file('../database.ini');
$host = $config['host'];
$dbname = $config['dbname'];
$user = $config['user'];
$password = $config['password'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $conn = null;
}
