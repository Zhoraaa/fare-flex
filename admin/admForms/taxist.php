<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT taxists.id, 
       users.name, 
       users.email, 
       users.phone, 
       CONCAT(cars.color, ' ', cars.name) AS car, 
       cars.number AS car_number, 
       car_types.name AS car_type, 
       taxist_status.name AS `status` 
FROM taxists 
INNER JOIN users ON taxists.user = users.id 
LEFT JOIN cars ON taxists.car = cars.id 
INNER JOIN taxist_status ON taxists.status = taxist_status.id 
LEFT JOIN car_types ON cars.type = car_types.id

WHERE `taxists`.`id` = " . $_GET['id'];
$thisTaxist = selectFrom($query, "ONE");
?>
<h1>Информация о сотруднике</h1>
<?php
$descTaxist = [
    "Сотрудник",
    "E-mail",
    "Телефон",
    "Машина",
    "Гос. номер",
    "Тип авто",
    "Статус"
];

$descTaxistKey = 0;
foreach ($thisTaxist as $key => $item) {
    switch ($key) {
        case "id":
        case "photo":
            break;
        case "car":
        case "car_number":
            case "car_type":
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descTaxist[$descTaxistKey] ?>:</span>
                <span>
                    <?php
                    if (isset($thisTaxist['car'])) {
                        echo $item;
                    } else {
                        echo "Требуется авто";
                    }
                    ?>
                </span>
            </div>
        <?php
            $descTaxistKey++;
            break;
        case "from_street_str":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descTaxist[$descTaxistKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisTaxist['from_house'] ?></span>
            </div>
        <?php
            $descTaxistKey++;
            break;
        case "to_street_str":
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descTaxist[$descTaxistKey] ?>:</span>
                <span>ул.<?= $item ?>,<br>д. <?= $thisTaxist['to_house'] ?></span>
            </div>
        <?php
            $descTaxistKey++;
            break;
        default:
        ?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descTaxist[$descTaxistKey] ?>:</span>
                <span><?= $item ?></span>
            </div>
<?php
            $descTaxistKey++;
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