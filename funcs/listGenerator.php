<?php
function generateListItem($listItem, $listType)
{
?>
    <div class="accent brad10 flex jc-sb ai-c">
        <span>
            Заказ #
            <?= $listItem['id'] ?>
        </span>
        <div class="flex g10">
            <?php
            switch ($listType) {
                case "order":
                    $href = "?edit=order&id=" . $listItem['id'];
                    break;
                case "product":
                    $href = "?tool=products&edit=product&id=" . $listItem['id'];
                    break;
                case "company":
                    $href = "?tool=categories&edit=company&id=" . $listItem['id'];
                    break;
                case "type":
                    $href = "?tool=categories&edit=type&id=" . $listItem['id'];
                    break;
            }
            ?>
            <a href="<?= $href ?>" class="accent-invert">🖍</a>
        </div>
    </div>
<?php
}
