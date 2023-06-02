<?php
include "../functions/connect.php";

$name = $_GET['name'];
$login = $_GET['login'];
$email = $_GET['email'];
$pass = ($_GET['password'] == $_GET['password_repeat']) ? $_GET['password'] : false;

// Проверка уникальности
$query = "SELECT * FROM `users` WHERE 
`login`='$login' OR `email`='$email'";

$res = $con->query($query);
$checkUnique = $res->fetch_all();

if (!empty($checkUnique)) {
    $_SESSION['result'] = "Данные не уникальны";
} elseif (!$pass) {
    $_SESSION['result'] = "Пароли не совпадают.";
} elseif (strlen($pass) < 6) {
    $_SESSION['result'] = "Минимальная длинна пароля - 6 символов.";
} else {
    $query = "INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `role`) VALUES (NULL, '$name', '$login', '$email', '" . md5($pass) . "', '3')";
    $res = $con->query($query);

    // Аутентификация после регистрации
    include "signInDB.php";

    $_SESSION['result'] = "Регистрация завершена, рады вас видеть, " . $user['name'];
}
header("location: /signUp.php");