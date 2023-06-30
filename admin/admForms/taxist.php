<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT 
taxists.id, 
users.name, 
users.email, 
users.phone, 
taxists.photo, 
CONCAT(cars.color, ' ', cars.name) AS car, 
cars.number AS car_number, car_types.name AS type, 
taxist_status.name AS `status` 

FROM taxists 

INNER JOIN users ON taxists.user = users.id 
INNER JOIN cars ON taxists.car = cars.id 
INNER JOIN taxist_status ON taxists.status = taxist_status.id 
INNER JOIN car_types ON cars.type = car_types.id

WHERE `taxists`.`id` = " . $_GET['id'];
$thisTaxist = selectFrom($query, "ONE");
?>
<h1>Информация об экземпляре</h1>
<?php
$descorder = [
    "Сотрудник",
    "E-mail",
    "Телефон",
    "Машина",
    "Гос. номер",
    "Тип авто",
    "Статус"
];

$descorderKey = 0;
foreach ($thisTaxist as $key => $item) {
    switch ($key) {
        case "id":
        case "photo":
            break;
        case "from_street_str":
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisTaxist['from_house'] ?></span>
            </div>
        <?php
            $descorderKey++;
            break;
        case "to_street_str":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descorder[$descorderKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisTaxist['to_house'] ?></span>
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
<form action="../funcs/changeStatus.php" method="post" class="btns mauto">
    <input type="text" class="hide" name="taxist" value="<?= $thisTaxist['id'] ?>">
    <select name="status" id="" class="accent">
        <?php
        $query = "SELECT * FROM `taxist_status`";
        $statuses = selectFrom($query, "ALL");

        foreach ($statuses as $status) {
            $selected = ($status['name'] == $thisTaxist['status']) ? "selected" : null;
        ?>
            <option value="<?= $status['id'] ?>" <?= $selected ?>><?= $status['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <button class="accent">Сохранить</button>
</form>