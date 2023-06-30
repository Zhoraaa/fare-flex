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
    <form action="" class="flex g10 ai-c">
        <span>Выберите пункт отправления:</span>
        <select required name="from" id="" class="accent">
            <option value selected disabed>Выберитe адрес</option>
            <?php
            foreach ($addresses as $address) {
                $selected = (isset($_GET['from']) && $_GET['from'] == $address['street'] . "+" . $address['house']) ? "selected" : null;
            ?>
                <option <?= $selected ?> value="<?= $address['street'] ?>+<?= $address['house'] ?>">
                    ул. <?= $address['street_str'] ?>, д. <?= $address['house'] ?>
                </option>
            <?php
            }
            ?>
        </select>

        <span>и пункт прибытия:</span>
        <select required name="to" id="" class="accent">
            <option value selected disabed>Выберитe адрес</option>
            <?php
            foreach ($addresses as $address) {
                $selected = (isset($_GET['to']) && $_GET['to'] == $address['street'] . "+" . $address['house']) ? "selected" : null;
            ?>
                <option <?= $selected ?> value="<?= $address['street'] ?>+<?= $address['house'] ?>">
                    ул. <?= $address['street_str'] ?>, д. <?= $address['house'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <?php
        $weight = ($_GET['weight']) ?? null;
        $time = ($_GET['when']) ?? null;
        ?>
        <input required type="number" name="weight" value="<?= $weight ?>" step="any" min="10" max="700" class="accent" placeholder="Вес перевозки (в кг)">
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
            function getAdress($orderADRS)
            {
                $output = null;

                $query = "SELECT `name` FROM `streets` WHERE `id` = " . $orderADRS['0'];
                $check = selectFrom($query, "ONE");
                $output .= "ул. " . $check['name'] . ", ";

                $query = "SELECT `house` FROM `houses` WHERE `house` = " . $orderADRS['1'];
                $check = selectFrom($query, "ONE");
                $output .= "д. " . $check['house'];

                return $output;
            }

            $from = getAdress(explode("+", $_GET['from']));
            $to = getAdress(explode("+", $_GET['to']));
        ?>
            <div class="inner-shadow brad20 p20 m20 flex column g10">
                <h2>
                    Предпросмотр заказа:
                    <input type="text" name="from" value="<?= $_GET['from'] ?>" class="hide">
                    <input type="text" name="to" value="<?= $_GET['to'] ?>" class="hide">
                    <input type="number" name="weight" value="<?= $weight ?>" class="hide">
                    <input type="time" name="when" value="<?= $time ?>" class="hide"/>
                </h2>
                <span>Пункт отправления: <?= $from ?>.</span>
                <span>Пункт прибытия: <?= $to ?>.</span>
                <span>Вес перевозки: <?= $_GET['weight'] ?> кг.</span>
                <span>Время перевозки: <?= $_GET['when'] ?></span>
                <div class="btns">
                    <button class="accent">Подтвердить</button>
                    <a href="/" class="accent">Отменить</a>
                </div>
            </div>
        <?php }

        if ($_GET['from'] == $_GET['to']) {
        }
    } else {
        ?>
    <?php
    }
    ?>
</div>