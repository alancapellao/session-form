<?php

$config = parse_ini_file('../database.ini');
$host = $config['host'];
$dbname = $config['dbname'];
$user = $config['user'];
$password = $config['password'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $pdo = null;
}
