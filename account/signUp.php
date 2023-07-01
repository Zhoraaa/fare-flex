<?php
require_once("../funcs/DBinteraction.php");
require("../funcs/session.php");

// Подключение БД и сессии
$_SESSION['result'] = "Регистрация не была завершена по неизвестной ошибке";

// Запись в переменные для последующего SQL-запроса
$login = $_GET['login'];
$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$pass = ($_GET['password'] == $_GET['password_repeat']) ? $_GET['password'] : false;

// Защита от дурака, отключившего JS
if (!$login || mb_strlen($login) < 6 || mb_strlen($login) > 32) {
    $_SESSION['result'] = "Введите корректный логин (от 6 до 32 символов, латиница и цифры)";
} elseif (!$pass || mb_strlen($pass) < 6 || mb_strlen($pass) > 32) {
    $_SESSION['result'] = "Некорректный пароль (от 6 до 32 символов, латиница и цифры)";
} else {
    // Проверка логина, почты и телефона на уникальность
    $checkLogin = selectFrom("SELECT * FROM users WHERE `login`='$login'", "ONE");
    $checkEmail = selectFrom("SELECT * FROM users WHERE `email`='$email'", "ONE");
    $checkPhone = selectFrom("SELECT * FROM users WHERE `phone`='$phone'", "ONE");

    if ($checkLogin) {
        $_SESSION['result'] = "Логин уже используется";
    } elseif ($checkEmail) {
        $_SESSION['result'] = "Почта уже используется";
    } elseif ($checkPhone) {
        $_SESSION['result'] = "Телефон уже используется";
    } else {
        // Добавление пользователя.
        $pass = md5($pass);

        $query = "SELECT * FROM `users` WHERE `role` = 1";
        $checkRole = selectFrom($query, "ONE");
        $role = (empty($checkRole)) ? 1 : 3 ;

        $query = "INSERT INTO `users`
        (`id`, `login`, `name`, `email`, `phone`, `password`, `role`) 
        VALUES 
        (NULL,'$login','$name','$email', '$phone','$pass', '$role')";
        $res = insertOrUpdate($query);

        // Автоматический вход в аккаунт после регистрации
        include "signIn.php";

        include "../funcs/user.php";

        $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $user['name'] . "!";
    }
}
header("location: /");
