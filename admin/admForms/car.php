<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT 
`cars`.`id`,
CONCAT(`cars`.`color`, ' ', `cars`.`name`) AS `name`,
`cars`.`number`,
`car_types`.`name` AS `type`
FROM 
`cars`
INNER JOIN 
`car_types` ON `cars`.`type` = `car_types`.`id`
LEFT JOIN 
`taxists` ON `cars`.`id` = `taxists`.`car`

WHERE `cars`.`id` = " . $_GET['id'];
$thisCar = selectFrom($query, "ONE");
?>
<h1>Информация о автомобиле</h1>
<?php
$descCar = [
    "Автомобиль",
    "Госномер",
    "Тип",
];
$descCarKey = 0;
foreach ($thisCar as $key => $item) {
    switch ($key) {
        case "id":
            break;
        default:
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descCar[$descCarKey] ?>:</span>
                <span><?= $item ?></span>
            </div>
<?php
            $descCarKey++;
            break;
    }
}
?>
<form action="../funcs/changeStatus.php" method="post" class="btns mauto flex g10 ai-c">
    <input type="text" class="hide" name="taxist" value="<?= $thisCar['id'] ?>">
    <span>Закрепить за: </span>
    <select name="status" id="" class="accent">
        <option value selected disabled>За кем?</option>
        <?php
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

  WHERE `car` IS NULL";
        $statuses = selectFrom($query, "ALL");

        foreach ($statuses as $status) {
            $selected = ($status['name'] == $thisCar['status']) ? "selected" : null;
        ?>
            <option value="<?= $status['id'] ?>" <?= $selected ?>><?= $status['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <button class="accent">Сохранить</button>
</form>