$(function () {

    $("#register").on("click", function (e) {
        e.preventDefault();

        var campoUser = $("#username").val();
        var campoEmail = $("#email").val();
        var campoPassword = $("#password").val();

        if (campoPassword.length === 8) {
            if (campoUser.trim() == "" || campoEmail.trim() == "" || campoPassword.trim() == "") {
                alert("Fill in all fields.");
            } else {

                $.ajax({

                    url: "../../src/controller/insert.php",
                    type: "POST",
                    data: {
                        username: campoUser,
                        email: campoEmail,
                        password: campoPassword
                    },
                    success: function (data) {
                        data = JSON.parse(data);

                        if (retorno["erro"]) {
                            alert(data["mensagem"]);
                        } else {
                            alert(data["mensagem"]);
                            window.location.href = "login.php";
                        }
                    }
                });
            }
        } else {
            alert("Password must contain 8 characters.");
        }
    });
});