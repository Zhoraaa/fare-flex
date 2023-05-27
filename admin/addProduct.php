<?php
include "../functions/connect.php";

$name = $_POST['name'];
$img = $_FILES['img']['name'];
$country = $_POST['country'];
$source = $_POST['source'];
$cost = $_POST['cost'];
$count = $_POST['count'];
$type = $_POST['type'];

$query = "SELECT * FROM `menu` WHERE `name`='$name'";
$res = $con->query($query);
$check = $res->fetch_assoc();

if (!empty($check)) {
    $_SESSION['result'] = "Такой товар уже есть!";
} else {
    $moveTo = "../img/product/" . $img;
    move_uploaded_file($_FILES['img']['tmp_name'], $moveTo);

    $query = "INSERT INTO `menu` (`id`, `name`, `img`, `country`, `source`, `cost`, `count`, `type`)
    VALUES (NULL, '$name', '$img', '$country', '$source', '$cost', '$count', '$type')";
    $res = $con->query($query);
    
    $_SESSION['result'] = "Товар добавлен!";
}

header("location: ../admin/");
