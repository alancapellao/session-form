<?php

require_once '../config/connection.php';

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email'])) {

    require_once '../model/Usuario.class.php';

    $id = addslashes($_POST['id']);
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);

    $username = strtolower($username);
    $email = strtolower($email);

    $user = new Usuario($id, $username, $email, null, $pdo);

    if ($user->update() == true) {
        echo json_encode(array("error" => 0, "message" => "Successfully update!"));
    } else {
        echo json_encode(array("error" => 1, "message" => "User or email already exists."));
    }
}
