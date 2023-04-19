<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="page">
        <div class="form">
            <form class="login-form" id="formulario">
                <h1>Login</h1>
                <input type="text" placeholder="username or email" id="username" name="username"/>
                <input type="password" placeholder="password" id="password" name="password"/>
                <button id="login">login</button>
                <p class="message">Not registered? <a href="register.php">Create an account</a></p>
            </form>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/login.js"></script>

</html>