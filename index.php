<?php
include "./funcs/pageBase.php";

$query = "SELECT 
`houses`.`id`,
`houses`.`street`,
`houses`.`house`,
`streets`.`name` AS `street_str`

FROM `houses` 

INNER JOIN `streets` ON `houses`.`street` = `streets`.`id`

ORDER BY `street_str` ASC";
$addresses = selectFrom($query, "ALL");
?>
<form action="" class="first-content-on-page inner-shadow brad20 p20 flex g10 ai-c">
    <span>Выберите пункт отправления:</span>
    <select name="from" id="" class="accent">
        <?php
        foreach ($addresses as $address) {
        ?>
            <option value="<?= $address['street'] ?>+<?= $address['house'] ?>">
                ул. <?= $address['street_str'] ?>, д. <?= $address['house'] ?>
            </option>
        <?php
        }
        ?>
    </select>

    <span>и пункт прибытия:</span>
    <select name="from" id="" class="accent">
        <?php
        foreach ($addresses as $address) {
        ?>
            <option value="<?= $address['street'] ?>+<?= $address['house'] ?>">
                ул. <?= $address['street_str'] ?>, д. <?= $address['house'] ?>
            </option>
        <?php
        }
        ?>
    </select>
    <button class="accent">Рассчитать цену</button>

</form>