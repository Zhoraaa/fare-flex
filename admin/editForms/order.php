<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT orders.id,
taxists.name AS taxist, 
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

WHERE `orders`.`id` = " . $_GET['id'];
$thisorder = selectFrom($query, "ONE");
?>
<h1>Информация об экземпляре</h1>
<?php
$descorder = [
    "Таксист",
    "Почта клиента",
    "Адрес отправления",
    "Адрес прибытия",
    "Статус"
];

$descorderKey = 0;
foreach ($thisorder as $key => $item) {
    switch ($key) {
        case "id":
        case "from_street":
        case "to_street":
        case "from_house":
        case "to_house":
            break;
        case "from_street_str":
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisorder['from_house'] ?></span>
            </div>
        <?php
            $descorderKey++;
            break;
        case "to_street_str":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisorder['to_house'] ?></span>
            </div>
        <?php
            $descorderKey++;
            break;
        default:
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span><?= $item ?></span>
            </div>
<?php
            $descorderKey++;
            break;
    }
}
?>