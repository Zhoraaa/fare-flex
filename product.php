<?php
include "./pageBase.php";

if (!isset($_GET['id'])) {
    $_SESSION['result'] = "Неизвестная ошибка.";
    header("location: /");
    exit();
}

$query = "SELECT * FROM `menu` WHERE `id`=" . $_GET['id'];
$res = $con->query($query);
$product = $res->fetch_assoc();
?>
<main id="productPage">
    <div id="posterWrapper">
        <img src="./img/product/<?= $product['img'] ?>" alt="<?= $product['name'] ?>" id="poster" class="brad15">
    </div>
    <div id="infoWrapper">
        <h2><?= $product['name'] ?></h2>
        <div id="summary">
            <p>Состав: <?= $product['source'] ?></p>
            <p>Родина блюда: <?= $product['country'] ?></p>
            <p>Доступно: <?= $product['count'] ?></p>
        </div>
        <button class="pad15 brad15 invert-color">Заказать за <?= $product['cost'] ?>₽</button>
    </div>
</main>