<?php

setcookie("user", $user['id'], time(), "/");
unset($_COOKIE['user']);

header("location: /");