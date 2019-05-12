<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "capt" && $password == "123") {
    $_SESSION["user"] = $username;
    header("Location: filem.php");
}
else {
    echo "Login Gagal!";
    header("Refresh:1; url=index.php", true, 303);
    exit();
}
