$(function () {

    $("#login").on("click", function (e) {
        e.preventDefault();

        const campoUser = $("#username").val();
        const campoPassword = $("#password").val();

        if (campoUser.trim() == "" || campoPassword.trim() == "") {
            alert("Fill in all fields.");
        } else {
            $.ajax({
                url: "../../src/controller/login.php",
                method: "POST",
                dataType: "json",
                data: {
                    username: campoUser,
                    password: campoPassword
                },
                success: function (data) {

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