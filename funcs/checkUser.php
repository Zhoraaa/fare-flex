<?php
if (isset($_COOKIE['user'])) {
    $query = "SELECT * FROM `users` WHERE `id`=" . $_COOKIE['user'];
    $res = $con->query($query);
    $user = $res->fetch_assoc();
}
