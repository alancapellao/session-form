<?php
session_start();

require_once '../config/connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

    require_once '../model/Usuario.class.php';

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    $username = strtolower($username);

    $user = new Usuario(null, $username, null, $password, $pdo);

    if ($user->login() == true) {
        echo json_encode(array("error" => 0, "message" => "Login successful!"));
    } else {
        echo json_encode(array("error" => 1, "message" => "Incorrect username or password."));
    }
}
