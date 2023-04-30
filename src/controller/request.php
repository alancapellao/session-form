<?php
session_start();

require_once '../config/connection.php';

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {

    require_once '../models/Usuario.class.php';

    $user = new Usuario(null, null, null, null, $conn);

    $usuario = $user->session();

    echo json_encode($usuario);
}
