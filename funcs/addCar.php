<?php

if (!empty($_POST)) {
    function insertCar($_POST, $type)
    {
        require('DBinteraction.php');

        $transport = $_POST['transport'];
        $model = $_POST['model'];
        $number = $_POST['number'];
        $color = $_POST['color'];

        $query = "INSERT INTO `cars`(`passport`, `name`, `number`, `color`, `type`) VALUES ('$transport','$model','$number','$color','$type')";
        insertOrUpdate($query);
    }
    function lastCar() {
        require('DBinteraction.php');
        $query = "SELECT `id` FROM `cars` ORDER BY `id` DESC";
        $last = selectFrom($query, "ONE");

        return $last['id'];
    }
}
