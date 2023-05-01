<?php
session_start();

require_once '../config/connection.php';

if (isset($_SESSION['id'])) {

    require_once '../model/Usuario.class.php';

    $user = new Usuario($_SESSION['id'], null, null, null, $pdo);

    if ($user->delete() == true) {
        echo json_encode(array("error" => 0, "message" => "Account deleted successfully.!"));
    } else {
        echo json_encode(array("error" => 1, "message" => "Error deleting account."));
    }
}
