<?php
$query = "SELECT * FROM `taxists` JOIN `users` ON `taxists`.`user` = `users`.`id` ORDER BY `name` ASC";
$res = $con->query($query);
$taxists = $res->fetch_all(MYSQLI_ASSOC);

return $taxists;