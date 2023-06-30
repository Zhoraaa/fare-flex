<?php
require "./funcs/pageBase.php";
?>
<div id="first-content-on-page">
  <form action="addNewTaxist.php" method="get" enctype="multipart/form-data" class="inner-shadow brad20 p20 flex column ai-c g10">
    <h2>Заявка на работу таксистом</h2>
    <h4>Ваше фото</h4>
    <div><input class="accent" type="file" name="photo"></div>
    <h4>Паспорт</h4>
    <div><input class="accent" type="file" name="passport"></div>
    <h4>Водительское удостоверение</h4>
    <div><input class="accent" type="file" name="driver"></div>
    <div id="infoCar">
      <?php include "ajax-sources/form-car.html" ?>
    </div>
    <div>
      <label for="haveCar">
        <input class="accent" type="checkbox" name="haveCar" id="haveCar">
        <span>Нет личного авто</span>
      </label>
    </div>
    <div>
      <label for="perData">
        <input required class="accent" type="checkbox" name="perData" id="perData">
        <span>Даю своё согласие на обработку персональных данных.</span>
      </label>
    </div>
    <button class="accent">Подать заявку</button>
  </form>
</div>

<script src="../js/ajax.js"></script>
<script>
  var haveCar = document.querySelector('#haveCar');
  haveCar.addEventListener('change', () => {
    if (haveCar.checked) {
      asyncClear("infoCar");
    } else {
      asyncLoad("./ajax-sources/form-car.html", "infoCar");
    }
  })
</script>