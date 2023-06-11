<?php 
$query = "SELECT * FROM `orders` WHERE `id` = " . $_GET['id'];
$res = $con->query($query);
$order = $res->fetch_assoc();

$query = "SELECT `user` FROM `taxists` WHERE `id` = " . $order['taxist'];
$res = $con->query($query);
$taxist = $res->fetch_assoc();

$query = "SELECT `name` FROM `users` WHERE `id` = " . $taxist['user'];
$res = $con->query($query);
$taxist = $res->fetch_assoc();

$query = "SELECT `name` FROM `users` WHERE `id` = " . $order['client'];
$res = $con->query($query);
$client = $res->fetch_assoc();

$query = "SELECT `name` FROM `status` WHERE `id` = " . $order['status'];
$res = $con->query($query);
$status = $res->fetch_assoc();
?>
<div class="tool inner-shadow brad15">
  <p>Таксист: <?=$taxist['name']?></p>
  <p>Клиент: <?=$client['name']?></p>
  <p>Оценка таксиста: <?=$order['grade_taxist']?></p>
  <p>Оценка клиента: <?=$order['grade_client']?></p>
  <p>Заказ <?=$status['name']?></p>
</div>