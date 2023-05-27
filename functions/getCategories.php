<?php
$query = "SELECT * FROM `categories`";
$res = $con->query($query);
$categories = $res->fetch_all(MYSQLI_ASSOC);

return $categories;