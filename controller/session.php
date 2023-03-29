<?php

require 'model/connection.php';

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    
    require_once 'class/Usuario.class.php';

    $user = new Usuario(null, null, null, null);

    $usuario = $user->session();
} else {
    header("Location: index.php");
}
?>