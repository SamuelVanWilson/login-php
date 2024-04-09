<?php
require "../functions.php";

if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo '
        <script>
            alert("Anda Berhasil Register")
        </script>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Halaman Register</h1>

    <form action="" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username" require><br><br>

        <label for="email">email</label>
        <input type="email" name="email" id="email" require><br><br>

        <label for="password">password</label>
        <input type="password" name="password" id="password" require><br><br>

        <label for="password2">konfirmasi password</label>
        <input type="password" name="password2" id="password2" require><br><br>

        <button type="submit" name="submit">Daftar</button>
    </form>


</body>
</html>