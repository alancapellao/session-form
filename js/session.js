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

    $.ajax({
        url: 'controller/login.php',
        dataType: 'json',
        success: function (data) {
            var id = data.id;
            var username = data.username;
            var email = data.email;
            $("#id").val(id);
            $("#username").val(username);
            $("#email").val(email);
            $("#email").val(email);
        }
    });

    $("#logout").on("click", function (e) {
        e.preventDefault();

        $.ajax({
            url: "controller/logout.php",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                if (data.success == true) {
                    window.location.href = 'index.php';
                } else {
                    alert('Erro ao fechar sessão.');
                }
            }
        });
    });
});