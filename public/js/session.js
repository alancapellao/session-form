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
                url: "../../src/controller/update.php",
                method: "PUT",
                dataType: "json",
                data: {
                    id: campoId,
                    username: campoUser,
                    email: campoEmail
                },
                success: function (data) {

                    if (data["erro"]) {
                        alert(data["mensagem"]);
                    } else {
                        alert(data["mensagem"]);
                    }
                }
            });
        }
    });

    $.ajax({
        url: "../../src/controller/request.php",
        method: "GET",
        dataType: "json",
        success: function (data) {

            var id = data.id;
            var username = data.username;
            var email = data.email;
            $("#id").val(id);
            $("#username").val(username);
            $("#email").val(email);
        }
    });

    $("#logout").on("click", function (e) {

        $.ajax({
            url: "../../src/controller/logout.php"
        });
    });
});