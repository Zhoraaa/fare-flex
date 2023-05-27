<?php
include "../functions/connect.php";

$name = $_GET['name'];

$query = "SELECT * FROM `categories` WHERE `name`='$name'";
$res = $con->query($query);
$check = $res->fetch_assoc();

if (!empty($check)) {
    $_SESSION['result'] = "Такая категория уже есть!";
} else {
    $query = "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '$name')";
    $res = $con->query($query);
    
    $_SESSION['result'] = "Категория добавлена!";
}

header("location: ./categories.php");
