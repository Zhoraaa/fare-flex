<?php
require_once("DBinteraction.php");
$query = "SELECT orders.id,
user_taxist.id AS taxist, 
user_taxist.name AS taxist_name, 
user_taxist.email AS taxist_email, 
user_taxist.phone AS taxist_phone, 

user_client.id AS client, 
user_client.name AS client_name, 
user_client.email AS client_email, 
user_client.phone AS client_phone, 

street_from.name AS `from_street_str`, 
street_to.name AS `to_street_str`, 
house_from.street AS `from_street`, 
house_to.street AS `to_street`, 
house_from.house AS `from_house`, 
house_to.house AS `to_house`,  
orders.weight,
orders.cost,
statuses.name AS `status`

FROM orders

LEFT JOIN taxists ON orders.taxist = taxists.id
LEFT JOIN users AS user_taxist ON taxists.user = user_taxist.id
INNER JOIN users AS user_client ON orders.client = user_client.id
INNER JOIN statuses ON orders.status = statuses.id
INNER JOIN houses AS house_from ON orders.from = house_from.id
INNER JOIN houses AS house_to ON orders.to = house_to.id
INNER JOIN streets AS street_from ON house_from.street = street_from.id
INNER JOIN streets AS street_to ON house_to.street = street_to.id

WHERE `orders`.`id` = " . $_GET['id'];
$thisOrder = selectFrom($query, "ONE");
?>
<h1>Информация о заказе</h1>
<?php
$descorder = [
    "Таксист",
    "Почта таксиста",
    "Телефон таксиста",

    "Клиент",
    "Почта клиента",
    "Телефон клиента",

    "Адрес отправления",
    "Адрес прибытия",
    "Вес",
    "Стоимость",
    "Статус"
];

$descorderKey = 0;
foreach ($thisOrder as $key => $item) {
    $item = ($item) ?? "Требуется таксист";
    switch ($key) {
        case "id":
        case "taxist":
        case "client":
        case "from_street":
        case "to_street":
        case "from_house":
        case "to_house":
            break;
        case "from_street_str":
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisOrder['from_house'] ?></span>
            </div>
        <?php
            $descorderKey++;
            break;
        case "to_street_str":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisOrder['to_house'] ?></span>
            </div>
        <?php
            $descorderKey++;
            break;
        case "weight":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span><?= $item ?> кг</span>
            </div>
        <?php
            $descorderKey++;
            break;
        case "cost":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span><?= $item ?> ₽</span>
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
<div class="btns">
    <?php
    if (empty($thisOrder['taxist']) && $thisOrder['status'] == "Новый") {
    ?>
        <a href="./acceptOrder.php?id=<?= $thisOrder['id'] ?>" class="accent">Откликнуться</a>
    <?php } ?>
    <?php
    if ($user['id'] == $thisOrder['client'] && $thisOrder['status'] == "Новый") {
    ?>
        <a href="./cancelOrder.php?id=<?= $thisOrder['id'] ?>" class="accent">Отменить</a>
    <?php } ?>
</div>