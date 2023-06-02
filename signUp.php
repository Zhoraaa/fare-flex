<?php
include "./pageBase.php";
?>
<form action="../account/signUpDB.php" class="inner-shadow father-elem tool-form">
    <h2>Регистрация</h2>
    <div><input type="text" name="name" placeholder="Имя" required></div>
    <div><input type="text" name="login" placeholder="Логин" required></div>
    <div><input type="email" name="email" placeholder="Почта" required></div>
    <div><input type="password" name="password" placeholder="Пароль" required></div>
    <div><input type="password" name="password_repeat" placeholder="Повтор пароля" required></div>
    <div>
        <label for="rules">
            <input type="checkbox" name="rules" id="rules" required>
            <span>Ознакомлен с <a href="">правилами работы сервиса</a></span>
        </label>
    </div>
    <div><input type="submit" value="Зарегистрироваться"></div>
</form>