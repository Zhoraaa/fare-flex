<?php
include "admPageBase.php";

// Получаем меню
require "../functions/getOrders.php";

// режим редактирования товара
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `orders` WHERE `id`=" . $_GET['id'];
    $res = $con->query($query);
    $order = $res->fetch_assoc();
}
$changePart = (!isset($_GET['id'])) ? "Wait" : "Get";
?>

<main id="admTool">
    <?php
    require "../functions/order" . $changePart . ".php";
    ?>
    <div class="list">
        <?php
        foreach ($orders as $order) {
            
        ?>
            <div class="list-string invert-color brad15 pad15">
                <div>
                    <span>
                        Заказ #<?= $order['id'] ?>
                    </span>
                </div>
                <div class="tools">
                    <a href="?id=<?= $order['id'] ?>" class="to-default like-circle">🔍</a>
                </div>
            </div>
        <?php
        }
        if (empty($orders)) {
            echo "Ни один клиент ещё не оставил ни одного заказа.";
        }
        ?>
    </div>
</main>