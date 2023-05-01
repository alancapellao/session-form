$(function () {

    $("#update").on("click", function (e) {
        e.preventDefault();

        const campoId = $("#id").val();
        const campoUser = $("#username").val();
        const campoEmail = $("#email").val();

        if (campoUser.trim() == "" || campoEmail.trim() == "") {
            alert("Fill in all fields.");
        } else {
            $.ajax({
                url: "../../src/controller/update.php",
                method: "POST",
                dataType: "json",
                data: {
                    id: campoId,
                    username: campoUser,
                    email: campoEmail
                },
                success: function (data) {

                    if (data["error"]) {
                        alert(data["message"]);
                    } else {
                        alert(data["message"]);
                    }
                }
            });
        }
    });

    $.ajax({
        url: "../../src/controller/session.php",
        method: "GET",
        dataType: "json",
        success: function (data) {

            $("#id").val(data.id);
            $("#username").val(data.username);
            $("#email").val(data.email);
        }
    });

    $("#logout").on("click", function (e) {

        $.ajax({
            url: "../../src/controller/logout.php",
            success: function () {
                window.location.href = "login.php";
            }
        });

    });

    $("#delete").on("click", function (e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete the account?')) {
            $.ajax({
                url: "../../src/controller/delete.php",
                success: function (data) {

                    if (data["error"]) {
                        alert(data["message"]);
                    } else {
                        window.location.href = "login.php";
                    }
                }
            });
        }
    });
});