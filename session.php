<?php
require "controller/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Session</title>

<body>
    <div class="page">
        <div class="form">
            <form class="session-form" id="formulario">
                <h1>Session</h1>
                <input type="text" placeholder="id" id="id" name="id" value="<?php echo $usuario['id']; ?>" disabled />
                <input type="text" placeholder="username" id="username" name="username" value="<?php echo $usuario['username']; ?>"/>
                <input type="text" placeholder="email" id="email" name="email" value="<?php echo $usuario['email']; ?>"/>
                <button id="update">Update</button>
                <p class="message"><a href="index.php" onclick="<?php session_unset(); ?>">Logout</a></p>
            </form>
        </div>
    </div>
</body>

<script src="js/jquery.js"></script>

<script>

    $(function () {

        $("#update").on("click", function (e) {
            e.preventDefault();

            var campoId = $("#id").val();
            var campoUser = $("#username").val();
            var campoEmail = $("#email").val();

            if (campoUser.trim() == "" || campoEmail.trim() == "") {
                alert("Fill in all fields.");
            } else {

                $.ajax({

                    url: "controller/update.php",
                    type: "POST",
                    data: {
                        id: campoId,
                        username: campoUser,
                        email: campoEmail
                    },
                    success: function (retorno) {
                        retorno = JSON.parse(retorno);

                        if (retorno["erro"]) {
                            alert(retorno["mensagem"]);
                        } else {
                            alert(retorno["mensagem"]);
                        }
                    }
                });
            }
        });
    });
</script>

</html>