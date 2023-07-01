<header class="flex jc-sb white-text">
  <div>
    <img src="../img/logo.svg" alt="FareFlex">
  </div>
  <nav class="flex g10">
    <a href="/">Заказать такси</a>
    <a href="/about.php">О нас</a>
    <?php
    include_once("user.php");
    if (isset($user)) {
      if ($user['role'] == 2 || $user['role'] == 3) {
    ?>
        <a href="/account/orderInterface.php">Интерфейс заказов</a>
      <?php
      } ?>
      <?php
      if ($user['role'] == 1) {
      ?>
        <a href="/admin.php">Админ-панель</a>
    <?php
      }
    } ?>
  </nav>
  <nav class="flex g10">
    <?php if (!isset($user)) : ?>
      <a href="../ajax-sources/signInForm.html" class="ajax">Вход</a>
      <a href="../ajax-sources/signUpForm.html" class="ajax">Регистрация</a>
    <?php else : ?>
      <a href="../account/logOut.php">Выйти</a>
    <?php endif; ?>
  </nav>
</header>