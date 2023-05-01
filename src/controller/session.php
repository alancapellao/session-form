<?php
session_start();

require_once '../config/connection.php';

if (isset($_SESSION['id'])) {

    require_once '../model/Usuario.class.php';

    $user = new Usuario(null, null, null, null, $pdo);

    $usuario = $user->session();

    echo json_encode($usuario);
}
