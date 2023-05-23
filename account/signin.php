<?php
include("../pageBase.php");
require_once("../functions/connect.php");
require_once("../functions/alert.php");

// Защита от случаного срабатываения
if (!empty($_GET)) {
    require("signInDB.php");
}

if (!isset($_COOKIE['user'])) {
?>
<form action="/account/signinDB.php" id="auth">
    <h2>Вход</h2>
    <input type="text" name="login" placeholder="Логин / Почта">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit" value="Вход">
</form>
<?php } else {
    ?>
    <h1>Вы уже авторизованы</h1>
    <?php
}