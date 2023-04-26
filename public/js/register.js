$(function () {

    $("#register").on("click", function (e) {
        e.preventDefault();

        var campoUser = $("#username").val();
        var campoEmail = $("#email").val();
        var campoPassword = $("#password").val();


        if (campoUser.trim() == "" || campoEmail.trim() == "" || campoPassword.trim() == "") {
            alert("Fill in all fields.");
        } else {
            if (campoPassword.length !== 8) {
                alert("Password must contain 8 characters.");
            } else {
                $.ajax({

                    url: "../../src/controller/insert.php",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        username: campoUser,
                        email: campoEmail,
                        password: campoPassword
                    },
                    success: function (data) {

                        if (data["erro"]) {
                            alert(data["mensagem"]);
                        } else {
                            alert(data["mensagem"]);
                            window.location.href = "login.php";
                        }
                    }
                });
            }
        }
    });
});