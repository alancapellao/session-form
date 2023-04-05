$(function () {

    $("#login").on("click", function (e) {
        e.preventDefault();

        var campoUser = $("#username").val();
        var campoPassword = $("#password").val();

        if (campoUser.trim() == "" || campoPassword.trim() == "") {
            alert("Fill in all fields.");
        } else {

            $.ajax({

                url: "../../src/controller/request.php",
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