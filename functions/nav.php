<nav>
    <div class="logo"></div>
    <div class="links">
        <a href="../<?= $link ?>"><?= $name ?></a>
        <a href="../<?= $link ?>"><?= $name ?></a>
        <a href="../<?= $link ?>"><?= $name ?></a>
        <?php
        session_start();
        if ($_SESSION['role'] == 1) {
        ?>
            <a href="/admin">Админ-панель</a>
        <?php
        }
        ?>
    </div>
    <div class="authlinks">
        <?php
        if (!isset($_COOKIE['user'])) {
        ?>
            <a href="../account/signIn.php">Sign in</a>
            <a href="../account/signUp.php">Sign up</a>
        <?php
        } else {
        ?>
            <a href="../account/logOut.php">Log out</a>
        <?php
        }
        ?>
    </div>
</nav>