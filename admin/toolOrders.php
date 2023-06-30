<?php

require_once("./funcs/DBinteraction.php");
$query = "SELECT orders.id,
users.name AS taxist,
users.email AS client, 
street_from.name AS `from_street_str`, 
street_to.name AS `to_street_str`, 
house_from.street AS `from_street`, 
house_to.street AS `to_street`, 
house_from.house AS `from_house`, 
house_to.house AS `to_house`,  
statuses.name AS `status`

FROM orders

INNER JOIN users ON orders.client = users.id
INNER JOIN taxists ON orders.taxist = taxists.id
INNER JOIN statuses ON orders.status = statuses.id
INNER JOIN houses AS house_from ON orders.from = house_from.id
INNER JOIN houses AS house_to ON orders.to = house_to.id
INNER JOIN streets AS street_from ON house_from.street = street_from.id
INNER JOIN streets AS street_to ON house_to.street = street_to.id

ORDER BY `orders`.`id` DESC";
$orders = selectFrom($query, "ALL");

?>
<div class="list flex column g10 wcenter">
    <?php
    require("./funcs/listGenerator.php");
    ?>
    <h2>Новые заказы:</h2>
    <?php
    $emptyList = true;
    foreach ($orders as $order) {
        if ($order['status'] == "Новый") {
            generateListItem($order, "order");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Нет новых заказов.</p>
    <?php
    }
    ?>
    <h2>Выполняются:</h2>
    <?php
    $emptyList = true;
    foreach ($orders as $order) {
        if ($order['status'] == "В исполнении") {
            generateListItem($order, "order");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Сейчас ни один заказ не выполняется.</p>
    <?php
    }
    ?>
    <h2>Завершены:</h2>
    <?php
    $emptyList = true;
    foreach ($orders as $order) {
        if ($order['status'] == "Завершён") {
            generateListItem($order, "order");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Нет завершённых заказов.</p>
    <?php
    }
    ?>
    <h2>Отменены:</h2>
    <?php
    $emptyList = true;
    foreach ($orders as $order) {
        if ($order['status'] == "Отменён") {
            generateListItem($order, "order");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Нет отменённых заказов.</p>
    <?php
    }
    ?>
</div>