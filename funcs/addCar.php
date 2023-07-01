<?php

if (!empty($_GET)) {
    function insertCar($type)
    {
        require_once('DBinteraction.php');

        $transport = $_GET['transport'];
        $model = $_GET['model'];
        $number = $_GET['number'];
        $color = $_GET['color'];

        $query = "INSERT INTO `cars`
        (`passport`, `name`, `number`, `color`, `type`) 
        VALUES 
        ('$transport','$model','$number','$color','$type')";
        insertOrUpdate($query);
    }
    function lastCar() {
        require('DBinteraction.php');
        $query = "SELECT `id` FROM `cars` ORDER BY `id` DESC LIMIT 1";
        $last = selectFrom($query, "ONE");

        return "'" . $last['id'] . "'";
    }
}
