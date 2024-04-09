<?php
session_start();
require "../functions.php";

if (isset($_POST["submit"])) {
    if (isset($_POST["remember"])) {
        $getEmail = $_POST["email"];

        $getData = mysqli_fetch_assoc(query("SELECT * FROM users WHERE email = '$getEmail'"));

        $id = $getData["id"];
        $username = $getData["username"];

        setcookie("id", $id, time() + 100);
        setcookie("key", hash('sha256', $username), time() + 100);
    }


}

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $user = $_COOKIE["key"];

    $getData = mysqli_fetch_assoc(query("SELECT username FROM users WHERE id = $id"));
    if ($user === hash('sha256', $getData["username"])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header('Location: ../main.php'); exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <form action="" method="post">

        <label for="email">email</label>
        <input type="email" name="email" id="email" require><br><br>

        <label for="password">password</label>
        <input type="password" name="password" id="password" require><br><br>

        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>

        <button type="submit" name="submit">Login</button>
    </form>


</body>
</html>