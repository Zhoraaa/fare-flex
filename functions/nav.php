<nav class="invert-color">
    <div>
        <img src="../img/logo.svg" alt="лого" id="logo">
    </div>
    <div>
        <a href="../">Главная</a>
        <a href="../about.php">О нас</a>
        <?php
        if (isset($user) && $user['role'] == 1) {
        ?>
            <a href="../admin/">Админ-панель</a>
        <?php
        }
        ?>
    </div>
    <div>
        <?php
        if (!isset($_COOKIE['user'])) {
        ?>
            <a href="../signIn.php">Вход</a>
            <a href="../signUp.php">Регистрация</a>
        <?php
        } else {
        ?>
            <a href="../account/logOut.php">Выйти</a>
        <?php
        }
        ?>
    </div>
</nav>