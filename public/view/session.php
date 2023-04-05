<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Session</title>

<body>
    <div class="page">
        <div class="form">
            <form class="session-form" id="formulario">
                <h1>Session</h1>
                <input type="text" placeholder="id" id="id" name="id" disabled />
                <input type="text" placeholder="username" id="username" name="username" />
                <input type="text" placeholder="email" id="email" name="email" />
                <button id="update">Update</button>
                <p class="message"><a href="index.php" id="logout">Logout</a></p>
            </form>
        </div>
    </div>
</body>

<script src="../js/jquery.js"></script>
<script src="../js/session.js"></script>

</html>