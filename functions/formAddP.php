<form action="../admin/addProduct.php" method="post" enctype="multipart/form-data" class="tool-form inner-shadow brad15">
    <h2>Инструмент добавления</h2>
    <div><input type="text" name="name" placeholder="Название" required></div>
    <div><input type="file" name="img" placeholder="Фото" required></div>
    <div><input type="text" name="country" placeholder="Родина блюда" required></div>
    <div><input type="text" name="source" placeholder="Состав" required></div>
    <div><input type="number" name="cost" placeholder="Цена" required></div>
    <div><input type="number" name="count" placeholder="Количество" min="1" required></div>
    <select name="type" id="" required>
        <?php
        foreach ($categories as $category) {
        ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <div><input type="submit" value="Добавить"></div>
</form>