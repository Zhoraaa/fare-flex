<?php
setcookie('user', null, time(), "/");
unset($_SESSION['role']);
header("location: /");