<?php
require("../funcs/pageBase.php");
require_once("../funcs/DBinteraction.php");

if (isset($user)) {
    include("../funcs/showLists.php");

    if (!empty($_GET['edit'])) {
?>
        <div class="wcenter">
            <div class="inner-shadow brad20 g20 p20 flex column ai-c">
                <?php
                include("../funcs/showOrder.php");
                ?>
            </div>
        </div>
    <?php
    }
} else {
    $_SESSION['result'] = "Авторизуйтесь.";
}
