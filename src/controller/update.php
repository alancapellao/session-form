<?php

require_once '../config/connection.php';

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email'])) {

    require_once '../models/Usuario.class.php';

    $id = addslashes($_POST['id']);
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);

    $username = strtolower($username);
    $email = strtolower($email);

    $user = new Usuario($id, $username, $email, null, $conn);

    if ($user->update() == true) {
        echo json_encode(array("erro" => 0, "mensagem" => "Successfully update!"));
    } else {
        echo json_encode(array("erro" => 1, "mensagem" => "User or email already exists."));
    }
}
