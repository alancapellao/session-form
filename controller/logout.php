<?php
session_start();

session_unset();
session_destroy();

if(session_status() == PHP_SESSION_ACTIVE) {
    echo json_encode(['success' => false]);
} else {
    echo json_encode(['success' => true]);
}

exit();
?>