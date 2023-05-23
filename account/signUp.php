<?php
include("../pageBase.php");
include("../functions/connect.php");
include("../functions/alert.php");
?>
<form action="signUpDB.php" id="auth">
    <h2>Регистрация</h2>
    <input type="text" name="surname" placeholder="Фамилия" required>
    <input type="text" name="name" placeholder="Имя" required>
    <input type="text" name="patronymic" placeholder="Отчество" required>
    <input type="text" name="login" placeholder="Логин" required>
    <input type="email" name="email" placeholder="Почта" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="password" name="password_repeat" placeholder="Повтор пароля" required>
    <label for="rules">
        <input type="checkbox" name="rules" id="rules" required>
        <span>Ознакмолен с <a href="">правилами работы сервиса</a>.</span>
    </label>
    <input type="submit" value="Регистрация">
</form>