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
  </form>
</main>