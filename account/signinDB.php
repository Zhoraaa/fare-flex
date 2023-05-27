<?php
include "../functions/connect.php";

$login = $_GET['login'];
$pass = $_GET['password'];

$query = "SELECT * FROM `users` WHERE `login`='$login' OR `email`='$login' AND `password`='" . md5($pass) . "'";
$res = $con->query($query);
$user = $res->fetch_assoc();

if (empty($user)) {
    $_SESSION['result'] = "Мы с вами ещё не знакомы. Зарегистрируйтесь!";
    header("location: /signUp.php");
    exit();
}

setcookie("user", $user['id'], time() + 3600 * 24, "/");

header("location: /");