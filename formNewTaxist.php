<?php
require "./pageBase.php";
?>
<main>
  <form action="" method="post" enctype="multipart/form-data">
    <h2>Заявка на работу таксистом</h2>
    <div><input type="file" name="photo" placeholder=""></div>
    <h3>Паспорт</h3>
    <div><input type="text" name="passport" placeholder="XX XX XXXXXX"></div>
    <h3>Водительское удостоверение</h3>
    <div><input type="text" name="driver" placeholder="XX XX XXXXXX"></div>
    <h3>ПТС</h3>
    <div><input type="text" name="transport" placeholder="XX XX XXXXXX"></div>
    <div>
      <label for="haveCar">
        <input type="checkbox" name="haveCar" id="haveCar">
        <span>Есть личное авто</span>
      </label>
    </div>
    <div id="infoCar">

    </div>
  </form>
</main>

<script src="../scripts/ajax.js"></script>
<script>
  var haveCar = document.querySelector('#haveCar');
  haveCar.addEventListener('change', () => {
    if (haveCar.checked) {
      asyncLoad("taxist/form-car.html", "infoCar");
    } else {
      asyncClear("test");
    }
  })
</script>