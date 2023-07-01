<?php

require_once("./funcs/DBinteraction.php");
$query = "SELECT orders.id,
statuses.name AS `status`

FROM orders

INNER JOIN statuses ON orders.status = statuses.id	

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
</div>