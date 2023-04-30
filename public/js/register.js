$(function () {

    $("#register").on("click", function (e) {
        e.preventDefault();

        const campoUser = $("#username").val();
        const campoEmail = $("#email").val();
        const campoPassword = $("#password").val();

        if (campoUser.trim() == "" || campoEmail.trim() == "" || campoPassword.trim() == "") {
            alert("Fill in all fields.");
        } else {
            if (campoPassword.length !== 8) {
                alert("Password must contain 8 characters.");
            } else {
                $.ajax({
                    url: "../../src/controller/register.php",
                    method: "POST",
                    dataType: "json",
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