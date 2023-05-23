<?php
require_once("../functions/connect.php");

if (empty($_GET)) {
    $_SESSION['result'] = "Вы как сюда попали? Уходите!";
} else {
    // Присвоение данных для конечного добавления в базу
    $surname = $_GET['surname'];
    $name = $_GET['name'];
    $patronymic = ($_GET['patronymic']) ? "'" . $_GET['patronymic'] . "'" : "NULL";
    $login = $_GET['login'];
    $email = $_GET['email'];
    $pass = ($_GET['password'] == $_GET['password_repeat']) ? $_GET['password'] : false;

    $query = "SELECT * FROM `users` WHERE role = 1";
    $res = $con->query($query);
    $check = $res->fetch_all(MYSQLI_ASSOC);
    $role = (empty($check)) ? 1 : 2;

    // Проверки по ТЗ
    $query = "SELECT * FROM `users` WHERE `login` = '$login'";
    $res = $con->query($query);
    $checkLogin = $res->fetch_all(MYSQLI_ASSOC);

    $query = "SELECT * FROM `users` WHERE `email` = '$login'";
    $res = $con->query($query);
    $checkEmail = $res->fetch_all(MYSQLI_ASSOC);

    if (!empty($checkLogin)) {
        $_SESSION['result'] = "Логин занят.";
    } elseif (!empty($checkEmail)) {
        $_SESSION['result'] = "Почта уже используется.";
    } elseif ($pass == false) {
        $_SESSION['result'] = "Пароли не совпадают.";
    } elseif (strlen($pass) < 6) {
        $_SESSION['result'] = "Длинна пароля - не менее 6 символов.";
    } else {
        $query = "INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `login`, `email`, `password`, `role`) 
        VALUES (NULL, '$surname', '$name', $patronymic, '$login', '$email', '" . md5($pass) . "', '$role')";
        $res = $con->query($query);

        // Авторизация после регистрации
        $query = "SELECT * FROM `users` WHERE `login` = '$login'";
        $res = $con->query($query);
        $user = $res->fetch_assoc();

        setcookie('user', $user['id'], time() + 3600 * 24, "/");
        $_SESSION['role'] = $user['role'];
        $_SESSION['result'] = "Рады знакомству, " . $user['name'] . "!";
        header("location: /");
    }
}

header("location: signUp.php");
