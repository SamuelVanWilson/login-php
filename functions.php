<?php
$db = mysqli_connect("localhost", "root", "", "data_user");

function query($query){
    global $db;
    $result = mysqli_query($db, $query);

    return $result;
}

function register($data){
    global $db;
    $nama = htmlspecialchars(stripslashes($data["username"])) ;
    $password = mysqli_real_escape_string($db,htmlspecialchars($data["password"])) ;
    $confirmPass = mysqli_real_escape_string($db,htmlspecialchars($data["password2"])) ;
    $email = htmlspecialchars($data["email"]);

    $cekUser = query("SELECT username FROM users WHERE username = '$nama'");
    if (mysqli_fetch_assoc($cekUser)){
        echo '
        <script>
            alert("username sudah digunakan, ganti yang lain")
        </script>
        ';
        return false;
    }

    if ($password !== $confirmPass) {
        echo '
        <script>
            alert("pastikan mengisi password yang sama")
        </script>
        ';
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $addData = query("INSERT INTO users (username, password, email) VALUES ('$nama', '$password', '$email')");
    return mysqli_affected_rows($db);
}

function login($data){
    global $db;

    $email = $data["email"];
    $password = $data["password"];

    $cekPassword = mysqli_fetch_assoc(query("SELECT password FROM users WHERE email = '$email'"));
    $cekEmail = query("SELECT email FROM users WHERE email = '$email'");

    if (!mysqli_fetch_assoc($cekEmail)) {
        echo '
        <script>
            alert("email yang anda masukan salah")
        </script>
        ';
        return false;
    }

    if (!password_verify($password, $cekPassword["password"])) {
        echo '
        <script>
            alert("password yang anda masukan salah")
        </script>
        ';
        return false;
    }

    return true;
}
?>