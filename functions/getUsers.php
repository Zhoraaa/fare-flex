<?php
$query = "SELECT * FROM `users` WHERE `role` != 3 ORDER BY `name` ASC";
$res = $con->query($query);
$users = $res->fetch_all(MYSQLI_ASSOC);

return $users;