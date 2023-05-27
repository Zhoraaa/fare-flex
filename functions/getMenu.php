<?php
$query = "SELECT * FROM `menu` ORDER BY `id` DESC";
$res = $con->query($query);
$menu = $res->fetch_all(MYSQLI_ASSOC);

return $menu;