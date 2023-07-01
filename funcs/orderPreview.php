<?php
function getAddress($orderADRS)
{
    $query = "SELECT 
                `houses`.`id`,
                `houses`.`house`,
                `streets`.`id` AS `street`,
                `streets`.`name` AS `street_str`
                FROM `houses` 
                INNER JOIN `streets` ON houses.street = streets.id
                WHERE houses.`id` = '" . $orderADRS . "'";
    $check = selectFrom($query, "ONE");

    $output = [
        'house_id' => $check['id'],
        'house' => $check['house'],
        'street' => $check['street'],
        'strAddress' => "ул. " . $check['street_str'] . ", д." . $check['house']
    ];

    return $output;
}

$from = getAddress($_GET['from']);
$to = getAddress($_GET['to']);

$costHs = abs($from['house'] - $to['house']);
$costSt = abs($from['street'] - $to['street']);

$cost = round(($costHs * 5 + $costSt * 5) * ($_GET['weight'] * 0.75) + 150);
?>
<form action="./funcs/insertNewOrder.php" method="post" class="inner-shadow brad20 p20 m20 flex column g10">
    <h2>
        Предпросмотр заказа:
        <input type="text" name="from" value="<?= $from['house_id'] ?>" class="hide">
        <input type="text" name="to" value="<?= $to['house_id'] ?>" class="hide">
        <input type="number" name="weight" value="<?= $weight ?>" class="hide">
        <input type="time" name="when" value="<?= $time ?>" class="hide" />
        <input type="number" name="cost" value="<?= $cost ?>" class="hide" />
    </h2>
    <span>Пункт отправления: <?= $from['strAddress'] ?>.</span>
    <span>Пункт прибытия: <?= $to['strAddress'] ?>.</span>
    <span>Вес перевозки: <?= $_GET['weight'] ?> кг.</span>
    <span>Время перевозки: <?= $_GET['when'] ?></span>
    <span>Стоимость: <?= $cost ?> ₽</span>
    <div class="btns">
        <button class="accent">Подтвердить</button>
        <a href="/" class="accent">Отменить</a>
    </div>
</form>
<?php
