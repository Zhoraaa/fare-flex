<?php
require('DBinteraction.php');
require('user.php');

if (!empty($_GET)) {
    $passport = $_GET['passport'];
    $driver = $_GET['driver'];
    $car = "NULL";

    if (!$_GET['haveCar']) {
        require("./addCar.php");
        insertCar(2);
        $car = lastCar();
    }

    $query = "INSERT INTO `taxists`(`car`, `user`, `passport`, `driver_license`) VALUES ($car,'" . $user['id'] . "','$passport','$driver')";
    insertOrUpdate($query);

    $_SESSION['result'] = "Ваша заявка на рассмотрении, ожидайте ответа на почту или звонка от администрации.";
}
header('location: /');
