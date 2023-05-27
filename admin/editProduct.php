<?php
include "../functions/connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$country = $_POST['country'];
$source = $_POST['source'];
$cost = $_POST['cost'];
$count = $_POST['count'];
$type = $_POST['type'];

$query = "SELECT * FROM `menu` WHERE `id`='$id'";
$res = $con->query($query);
$check = $res->fetch_assoc();

$img = (!empty($_FILES['img']['name'])) ? $_FILES['img']['name'] : $check['img'];

if ($img != $check['img']) {
    $moveTo = "../img/product/" . $img;
    move_uploaded_file($_FILES['img']['tmp_name'], $moveTo);
}

$query = "UPDATE `menu` SET 
    `name` = '$name', 
    `img` = '$img', 
    `country` = '$country', 
    `source` = '$source', 
    `cost` = '$cost', 
    `count` = '$count', 
    `type` = '$type' 
    WHERE `menu`.`id`=" . $id;
$res = $con->query($query);

$_SESSION['result'] = "Товар изменён!";

header("location: ./");