<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="js/index.js">
    <script src="js/jquery.js"></script>
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

<script>

    $(function () {

        $("#login").on("click", function (e) {
            e.preventDefault();

            var campoUser = $("#username").val();
            var campoPassword = $("#password").val();

            if (campoUser.trim() == "" || campoPassword.trim() == "") {
                alert("Fill in all fields.");
            } else {

                $.ajax({

                    url: "controller/request.php",
                    type: "POST",
                    data: {
                        username: campoUser,
                        password: campoPassword
                    },
                    success: function (retorno) {
                        retorno = JSON.parse(retorno);

                        if (retorno["erro"]) {
                            alert(retorno["mensagem"]);
                        } else {
                            alert(retorno["mensagem"]);
                            window.location.href = "session.php";
                        }
                    }
                });
            }
        });
    });
</script>

</html>