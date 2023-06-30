<?php

require_once("./funcs/DBinteraction.php");
$query = "SELECT 
taxists.id, 
users.name, 
CONCAT(cars.color, ' ', cars.name) AS car,  
taxist_status.name AS `status` 

FROM taxists 

INNER JOIN users ON taxists.user = users.id 
INNER JOIN cars ON taxists.car = cars.id 
INNER JOIN taxist_status ON taxists.status = taxist_status.id 

ORDER BY users.name ASC";
$taxists = selectFrom($query, "ALL");

?>
<div class="list flex column g10 wcenter">
    <?php
    require("./funcs/listGenerator.php");
    ?>
    <h2>Заявки на работу:</h2>
    <?php
    $emptyList = true;
    foreach ($taxists as $taxist) {
        if ($taxist['status'] == "Ожидает ответа") {
            generateListItem($taxist, "taxist");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Новых заявок нет.</p>
    <?php
    }
    ?>
    <h2>Активные работники:</h2>
    <?php
    $emptyList = true;
    foreach ($taxists as $taxist) {
        if ($taxist['status'] == "Работает") {
            generateListItem($taxist, "taxist");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Работников нет.</p>
    <?php
    }
    ?>
    <h2>В чёрном списке:</h2>
    <?php
    $emptyList = true;
    foreach ($taxists as $taxist) {
        if ($taxist['status'] == "В чёрном списке") {
            generateListItem($taxist, "taxist");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Чёрный список пуст.</p>
    <?php
    }
    ?>
</div>