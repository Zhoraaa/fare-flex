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
<div id="first-content-on-page" class="inner-shadow brad20 p20 ">
    <?php
    function genOptions($address, $key)
    {
        $selected = (isset($_GET[$key]) && $_GET[$key] == $address['id']) ? "selected" : null;
    ?>
        <option <?= $selected ?> value="<?= $address['id'] ?>">
            ул. <?= $address['street_str'] ?>, д. <?= $address['house'] ?>
        </option>
    <?php
    }
    ?>
    <form action="" class="flex g10 ai-c">
        <span>Пункт отправления:</span>
        <select required name="from" id="" class="accent">
            <option value selected disabed>Выберитe адрес</option>
            <?php
            foreach ($addresses as $address) {
                genOptions($address, "from");
            }
            ?>
        </select>

        <span>Пункт прибытия:</span>
        <select required name=" to" id="" class="accent">
            <option value selected disabed>Выберитe адрес</option>
            <?php
            foreach ($addresses as $address) {
                genOptions($address, "to");
            }
            ?>
        </select>
        <?php
        $weight = ($_GET['weight']) ?? null;
        $time = ($_GET['when']) ?? null;
        ?>
        <span>Общий вес перевозки</span>
        <input required type="number" name="weight" value="<?= $weight ?>" step="any" min="10" max="700" class="accent" placeholder="Вес перевозки (в кг)">
        <span>Когда приступать:</span>
        <input type="time" name="when" value="<?= $time ?>" class="accent" list="popular" min="10:20" max="21:00" />
        <datalist id="popular">
            <option value="11:00">11:00</option>
            <option value="12:30">12:30</option>
            <option value="15:20">15:20</option>
            <option value="16:40">16:40</option>
        </datalist>
        <button class="accent">Рассчитать цену</button>
    </form>

    <?php
    if (!empty($_GET)) {
        if ($_GET['from'] == $_GET['to']) {
    ?>
            <div class="inner-shadow brad20 p20 m20 flex column g10">
                <h2>Выберите разные пункты отправления и прибытия.</h2>
            </div>
        <?php
        } else {
            include("funcs/orderPreview.php");
        }
    } else {
        ?>
    <?php
    }
    ?>
</div>