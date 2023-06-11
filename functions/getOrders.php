<?php
$query = "SELECT * FROM `orders` ORDER BY `id` ASC";
$res = $con->query($query);
$orders = $res->fetch_all(MYSQLI_ASSOC);

return $orders;