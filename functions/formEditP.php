<form action="editProduct.php" method="post" enctype="multipart/form-data" class="tool-form inner-shadow brad15">
    <h2>Инструмент редактирования</h2>
    <div><input type="text" name="name" placeholder="Название" value="<?= $product['name'] ?>" required></div>
    <div><input type="file" name="img"></div>
    <div><input type="text" name="country" placeholder="Родина блюда" value="<?= $product['country'] ?>" required></div>
    <div><input type="text" name="source" placeholder="Состав" value="<?= $product['source'] ?>" required></div>
    <div><input type="number" name="cost" placeholder="Цена" value="<?= $product['cost'] ?>" required></div>
    <div><input type="number" name="count" placeholder="Количество" min="1" value="<?= $product['count'] ?>" required></div>
    <select name="type" id="" required>
        <?php
        foreach ($categories as $category) {
            $selected = ($product['type'] == $category['id']) ? "selected" : null ;
        ?>
            <option value="<?= $category['id'] ?>" <?= $selected ?>><?= $category['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <div class="hide"><input type="text" name="id" value="<?= $product['id'] ?>" required></div>
    <div><input type="submit" value="Сохранить"></div>
    <div><a href="../admin/">Отмена</a></div>
</form>