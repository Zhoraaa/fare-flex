<?php
if ($user['role'] != 1) {
    $_SESSION['result'] = "Вы не являетесь администратором, покиньте админ-панель!";
    header("location: /");
    exit();
}