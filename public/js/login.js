$(function () {

    $("#login").on("click", function (e) {
        e.preventDefault();

        var campoUser = $("#username").val();
        var campoPassword = $("#password").val();

        if (campoUser.trim() == "" || campoPassword.trim() == "") {
            alert("Fill in all fields.");
        } else {

            $.ajax({

                url: "../../src/controller/login.php",
                type: "POST",
                data: {
                    username: campoUser,
                    password: campoPassword
                },
                success: function (data) {
                    data = JSON.parse(data);

                    if (data["erro"]) {
                        alert(data["mensagem"]);
                    } else {
                        alert(data["mensagem"]);
                        window.location.href = "index.php";
                    }
                }
            });
        }
    });
});