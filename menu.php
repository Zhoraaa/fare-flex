<?php
include "./pageBase.php";

// Готовим фильтры
include "./functions/getCategories.php";

// Достаём меню если нет гета
if (!isset($_GET['first'])) {
    include "./functions/getMenu.php";
} else {
    $where = null;
    $query = "SELECT * FROM `menu` $where ORDER BY " . $_GET['first'];
    $res = $con->query($query);
    $menu = $res->fetch_all(MYSQLI_ASSOC);
}
?>
<main>
    <form action="#" id="filters">

        <select name="first" id="">
            <option value="`id` DESC">Сначала новые</option>
            <option value="`id` ASC">Сначала старые</option>
            <option value="`cost` ASC">Сначала дешёвое</option>
            <option value="`cost` DESC">Сначала дорогое</option>
            <option value="`name` ASC">По имени (А-Я)</option>
            <option value="`name` DESC">По имени (Я-А)</option>
            <option value="`country` ASC">По родине (А-Я)</option>
            <option value="`country` DESC">По родине (Я-А)</option>
        </select>

        <div><input type="submit" value="Применить"></div>
    </form>

    <div id="menu">
        <?php
        foreach ($menu as $product) {
        ?>
            <a href="./product.php?id=<?= $product['id'] ?>" class="productCard">
                <div class="imgWrapper">
                    <img src="../img/product/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="cost"><?= $product['cost'] ?> ₽</div>
            </a>
        <?php
        }
        ?>
    </div>
</main>