<?php
include "admPageBase.php";

// Получаем меню
require "../functions/getTaxists.php";

// режим редактирования товара
if (isset($_GET['id'])) {
    $query = "SELECT * FROM `users` WHERE `id`=" . $_GET['id'];
    $res = $con->query($query);
    $product = $res->fetch_assoc();
}
$changePart = (!isset($_GET['id'])) ? "Wait" : "Get";
?>

<main id="admTool">
    <?php
    include "../functions/taxist" . $changePart . ".php";
    ?>

    <div class="list">
        <p>Заявки на работу таксистом.</p>
        <?php
        foreach ($taxists as $taxist) {
            if ($taxist['status'] == 2) {
        ?>
                <div class="list-string invert-color brad15 pad15">
                    <div>
                        <span>
                            <?= $taxist['name'] ?>
                        </span>
                    </div>
                    <div class="tools">
                        <a href="?id=<?= $taxist['id'] ?>" class="to-default like-circle">🔍</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <p>Действующие таксисты:</p>
        <?php
        foreach ($taxists as $taxist) {
            if ($taxist['status'] == 1) {
        ?>
                <div class="list-string invert-color brad15 pad15">
                    <div>
                        <span>
                            <?= $taxist['name'] ?>
                        </span>
                    </div>
                    <div class="tools">
                        <a href="?id=<?= $taxist['id'] ?>" class="to-default like-circle">🔍</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</main>