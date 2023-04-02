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