<?php
require_once '../../src/middleware/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Session</title>

<body>
    <div class="page">
        <div class="form">
            <form class="session-form" id="formulario">
                <input type="text" placeholder="id" id="id" name="id" disabled />
                <input type="text" placeholder="username" id="username" name="username" />
                <input type="text" placeholder="email" id="email" name="email" />
                <button id="update">update</button>
                <br><br>
                <p class="message"><a href="" id="logout">Logout</a></p>
                <h5>Or</h5>
                <p class="message"><a href="" id="delete">Delete Account</a></p>
            </form>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/session.js"></script>

</html>