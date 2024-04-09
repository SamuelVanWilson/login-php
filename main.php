<?php
session_start();
if (isset($_POST["logout"])) {
    setcookie("id", "", time() - 3600);
    setcookie("key", "", time() - 3600);
    session_destroy();

    header("Location: login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <h1>Anda Berhasil Login</h1>
    <form action="" method="post">
        <button type="submit" name="logout">logout</button>
    </form>
</body>
</html>