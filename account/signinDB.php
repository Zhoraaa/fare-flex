<?php
// Подключения
include("../pageBase.php");
require_once("../functions/connect.php");

$login = $_GET['login'];
$pass = md5($_GET['password']);

// Проверки
if (isset($user) || isset($_COOKIE['user'])) {
    $_SESSION['result'] = "Вы уже авторизованы.";
} elseif (!$login || !$pass) {
    $_SESSION['result'] = "Введите логин и пароль.";
} else {
    $query = "SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$login' AND `password`='$pass'";
    $res = $con -> query($query);
    $user = $res -> fetch_assoc();

    if (!empty($user)) {
        setcookie('user', $user['id'], time() + 3600 * 24, "/");
        $_SESSION['role'] = $user['role'];
        $_SESSION['result'] = "Рады вас видеть, ".$user['name']."!";
    } else {
        $_SESSION['result'] = "Мы с вами ещё не знакомы. Зергистрируйтесь!";
        header("location: signUp.php");
    }
}
header("location: /");