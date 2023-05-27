<?php
include "admPageBase.php";

// Получаем список категорий
require "../functions/getCategories.php";
?>
<main id="admTool">
    <form action="addCategory.php" class="tool-form inner-shadow brad15">
        <h2>Инструмент добавления</h2>
        <div><input type="text" name="name" placeholder="Название категории"></div>
        <div><input type="submit" value="Добавить"></div>
    </form>

    <div id="list">
        <?php
        foreach ($categories as $category) {
        ?>
            <div class="list-string invert-color brad15 pad15">
                <div>
                    <span>
                        <?= $category['name'] ?>
                    </span>
                </div>
                <div class="tools">
                    <a href="./delCategory.php?id=<?= $category['id'] ?>" class="to-default like-circle">×</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</main>