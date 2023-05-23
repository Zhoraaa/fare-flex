<?php
if (!empty($_SESSION['result'])) {
?>
    <div id="alert">
        <span><?= $_SESSION['result'] ?></span>
        <button id="deleter">×</button>
    </div>
    <script src="../scripts/alert-delete.js"></script>
<?php
    unset($_SESSION['result']);
}
