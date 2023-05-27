<?php
include "../functions/connect.php";
$query = "DELETE FROM `menu` WHERE `menu`.`id` = " . $_GET['id'];
$res = $con->query($query);

$_SESSION['result'] = "Товар удалён.";

header("location: ../admin");
