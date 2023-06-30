<?php 
$query = "SELECT * FROM `taxists` WHERE `user` = " . $_GET['id'];
$res = $con->query($query);
$worker = mysqli_fetch_assoc($res);

$query = "SELECT * FROM `users` WHERE `id` = " . $_GET['id'];
$res = $con->query($query);
$subject = mysqli_fetch_assoc($res);

$query = "SELECT `grade_taxist` FROM `orders` WHERE `taxist` = " . $worker['id'];
$res = $con->query($query);
$grades = $res->fetch_all(MYSQLI_ASSOC);

$grade = 4.95;
if (!empty($grades)) {
  foreach ($grades as $one_grade) {
    $grade = $grade + $one_grade['grade_taxist'];
  }
  $grade = round($grade / (count($grades)+1), 2); 
}
?>
<div class="tool inner-shadow brad15">
  <img src="../img/workers/<?=$worker['photo']?>" alt="<?=$subject['name']?>">
  <p>Имя: <?=$subject['name']?></p>
  <p>Паспорт: <?=$worker['passport']?></p>
  <p>Права: <?=$worker['driver_license']?></p>
  <p>Оценка: <?=$grade?></p>
</div>