<?php
$query = "SELECT * FROM `taxists` INNER JOIN `users` 
ON `taxists`.`user` = `users`.`name` ORDER BY `name` ASC";
$res = $con->query($query);
$taxists = $res->fetch_all(MYSQLI_ASSOC);

return $taxists;