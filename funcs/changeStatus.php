<?php
require("./DBinteraction.php");

if (!empty($_POST['taxist']) ?? !empty($_POST['status'])) {
    $taxist = $_POST['taxist'];
    $status = $_POST['status'];

    $query = "UPDATE `taxists` SET `status`='$status' WHERE `taxists`.`id` = '$taxist'";
    insertOrUpdate($query);

    $_SESSION['result'] = "Статус изменён.";
} else {
    $_SESSION['result'] = "Ошибка.";
}
header('location: /admin.php?tool=taxists');