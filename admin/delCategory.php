<?php
include "../functions/connect.php";
$query = "DELETE FROM `categories` WHERE `categories`.`id` = " . $_GET['id'];
$res = $con->query($query);

$query = "DELETE FROM `menu` WHERE `menu`.`type` = " . $_GET['id'];
$res = $con->query($query);

$_SESSION['result'] = "Категория удалена.";

header("location: ./categories.php");
