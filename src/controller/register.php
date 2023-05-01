<?php

require_once '../config/connection.php';

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {

    require_once '../model/Usuario.class.php';

    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    $username = strtolower($username);
    $email = strtolower($email);

    $user = new Usuario(null, $username, $email, $password, $pdo);

    if ($user->register() == true) {
        echo json_encode(array("error" => 0, "message" => "Successfully registered!"));
    } else {
        echo json_encode(array("error" => 1, "message" => "User or email already exists."));
    }
}
