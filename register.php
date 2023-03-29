<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="js/index.js">
    <title>Register</title>
</head>

<body>

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
</body>

<script src="js/jquery.js"></script>

<script>

    $(function () {

        $("#register").on("click", function (e) {
            e.preventDefault();

            var campoUser = $("#username").val();
            var campoEmail = $("#email").val();
            var campoPassword = $("#password").val();

            if (campoUser.trim() == "" || campoEmail.trim() == "" || campoPassword.trim() == "") {
                alert("Fill in all fields.");
            } else {

                $.ajax({

                    url: "controller/insert.php",
                    type: "POST",
                    data: {
                        username: campoUser,
                        email: campoEmail,
                        password: campoPassword
                    },
                    success: function (retorno) {
                        retorno = JSON.parse(retorno);

                        if (retorno["erro"]) {
                            alert(retorno["mensagem"]);
                        } else {
                            alert(retorno["mensagem"]);
                            window.location.href = "index.php";
                        }
                    }
                });
            }
        });
    });
</script>

</html>