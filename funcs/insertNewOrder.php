<?php
require_once("./DBinteraction.php");
require_once("./user.php");
if (isset($user)) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $weight = $_POST['weight'];
    $cost = $_POST['cost'];
    $time = date("H:i:s", strtotime($_POST['when']));
    $query = "INSERT INTO `orders`
    (`client`, `from`, `to`, `weight`, `time`, `cost`) 
    VALUES 
    ('" . $user['id'] . "','$from','$to','$weight', '$time','$cost')";
    insertOrUpdate($query);

    $query = "SELECT orders.id,
    user_client.name AS client 
    FROM orders
    INNER JOIN users AS user_client ON orders.client = user_client.id
    WHERE `user_client`.`id` = " . $user['id'] . " ORDER BY `orders`.`id` DESC LIMIT 1";
    $thisOrder = selectFrom($query, "ONE");

    $_SESSION['result'] = "Заказ добавлен, под номером " . $thisOrder['id'] . ". Oжидайте ответа на почту или звонка от исполнителя.";
    header('location: ../account/orderInterface.php');
} else {
    $_SESSION['result'] = "Сначала авторизуйтесь.";
    header('location: /');
}
