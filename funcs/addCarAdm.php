<?php
require("./addCar.php");
insertCar(1);
$_SESSION['result'] = "Машина добавлена.";
header("location: /admin.php?tool=cars");