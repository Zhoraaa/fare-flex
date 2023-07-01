<div class="flex column g20 wcenter">
    <?php
    require("./funcs/listGenerator.php");
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
WHERE 
`taxists`.`car` IS NULL
AND `cars`.`type` = 1";
    $freeCars = selectFrom($query, "ALL");
    ?>
    <div class="list flex column g10 wcenter">
        <h2>Свободные машины:</h2>
        <a href="?tool=cars&edit=car" class="accent ctrl-e brad10">+ Добавить</a>
        <?php
        $emptyList = true;
        foreach ($freeCars as $freeCar) {
            generateListItem($freeCar, "car");
            $emptyList = false;
        }
        if ($emptyList) {
        ?>
            <p>Нет свободных машин.</p>
        <?php
        }
        ?>
    </div>
</div>