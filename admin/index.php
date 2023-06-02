<?php
include "admPageBase.php";

// Получаем меню
require "../functions/getTaxists.php";

// режим редактирования товара
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `menu` WHERE `id`=" . $_GET['id'];
    $res = $con->query($query);
    $product = $res->fetch_assoc();
}
$changeForm = (!isset($_GET['id'])) ? "Add" : "Edit";
?>

<main id="admTool">
    <?php
    require "../functions/form" . $changeForm . "P.php";
    ?>

    <div id="list">
        <?php
        foreach ($taxists as $taxist) {
        ?>
            <div class="list-string invert-color brad15 pad15">
                <div>
                    <span>
                        <?= $taxist['name'] ?>
                    </span>
                </div>
                <div class="tools">
                    <a href="?id=<?= $taxist['id'] ?>" class="to-default like-circle">🖍</a>
                    <a href="./delCategory.php?id=<?= $product['id'] ?>" class="to-default like-circle">×</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</main> 