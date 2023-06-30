<?php
require "./funcs/pageBase.php";
?>
<main>
  <form action="" method="post" enctype="multipart/form-data">
    <h2>Заявка на работу таксистом</h2>
    <h3>Ваше фото. (Оображается при отклике)</h3>
    <div><input type="file" name="photo"></div>
    <h3>Паспорт</h3>
    <div><input type="file" name="passport"></div>
    <h3>Водительское удостоверение</h3>
    <div><input type="file" name="driver"></div>
    <div id="infoCar">
      <?php include "taxist/form-car.html" ?>
    </div>
    <div>
      <label for="haveCar">
        <input type="checkbox" name="haveCar" id="haveCar">
        <span>Нет личного авто</span>
      </label>
    </div>
    <div>
      <label for="perData">
        <input type="checkbox" name="perData" id="perData">
        <span>Даю своё согласие на обработку персональных данных.</span>
      </label>
    </div>
    <div><button class="pad15 brad15 box-shadow">Подать заявку</button></div>
  </form>
</main>

<script src="../scripts/ajax.js"></script>
<script>
  var haveCar = document.querySelector('#haveCar');
  haveCar.addEventListener('change', () => {
    if (haveCar.checked) {
      asyncClear("infoCar");
    } else {
      asyncLoad("taxist/form-car.html", "infoCar");
    }
  })
</script>