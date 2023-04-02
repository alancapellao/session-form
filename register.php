<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Register</title>
</head>

<body>
    <div class="page">
        <div class="form">
            <form class="register-form">
                <h1>Register</h1>
                <input type="text" placeholder="username" id="username" />
                <input type="text" placeholder="email" id="email" />
                <input type="password" placeholder="password" id="password" />
                <button id="register">register</button>
                <p class="message">Already registered? <a href="index.php">Sign In</a></p>
            </form>
        </div>
    </div>
</body>

<script src="js/jquery.js"></script>
<script src="js/register.js"></script>

</html>