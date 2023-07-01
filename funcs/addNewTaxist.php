<?php
require('DBinteraction.php');
require('user.php');

if (!empty($_POST)) {
    $passport = $_POST['passport'];
    $driver = $_POST['driver'];
    $car = "NULL";

    echo $query = "INSERT INTO `taxists`(`car`, `user`, `passport`, `driver_license`) VALUES ($car,'" . $user['id'] . "','$passport','$driver')";
    insertOrUpdate($query);
    $_SESSION['result'] = "Ваша заявка на рассмотрении, ожидайте ответа на почту.";
}
header('location: /');