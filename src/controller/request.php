<?php

require '../config/connection.php';

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    
    require_once '../models/Usuario.class.php';

    $user = new Usuario(null, null, null, null);

    $usuario = $user->session();

    echo json_encode($usuario);
}