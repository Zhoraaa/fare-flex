<?php
require("../funcs/pageBase.php");

if (isset($user)) {
    switch ($user['role']) {
        case 2:
            $query = "SELECT orders.id,
            user_taxist.name AS taxist,
            users.name AS client, 
            street_from.name AS `from_street_str`, 
            street_to.name AS `to_street_str`, 
            house_from.street AS `from_street`, 
            house_to.street AS `to_street`, 
            house_from.house AS `from_house`, 
            house_to.house AS `to_house`,  
            statuses.name AS `status`
            
            FROM orders
            
            INNER JOIN users ON orders.client = users.id
            INNER JOIN taxists ON orders.taxist = taxists.id
            INNER JOIN statuses ON orders.status = statuses.id
            INNER JOIN users AS user_taxist ON taxists.user = users.id
            INNER JOIN houses AS house_from ON orders.from = house_from.id
            INNER JOIN houses AS house_to ON orders.to = house_to.id
            INNER JOIN streets AS street_from ON house_from.street = street_from.id
            INNER JOIN streets AS street_to ON house_to.street = street_to.id
            
            WHERE `orders`.`status` = 1

            ORDER BY `orders`.`id` DESC";
            break;
        case 3:
            $query = "SELECT orders.id,
            users.name AS taxist,
            users.email AS client, 
            street_from.name AS `from_street_str`, 
            street_to.name AS `to_street_str`, 
            house_from.street AS `from_street`, 
            house_to.street AS `to_street`, 
            house_from.house AS `from_house`, 
            house_to.house AS `to_house`,  
            statuses.name AS `status`
            
            FROM orders
            
            INNER JOIN users ON orders.client = users.id
            INNER JOIN taxists ON orders.taxist = taxists.id
            INNER JOIN statuses ON orders.status = statuses.id
            INNER JOIN houses AS house_from ON orders.from = house_from.id
            INNER JOIN houses AS house_to ON orders.to = house_to.id
            INNER JOIN streets AS street_from ON house_from.street = street_from.id
            INNER JOIN streets AS street_to ON house_to.street = street_to.id
            
            WHERE `orders`.`status` = '1'

            ORDER BY `orders`.`id` DESC";
            break;
    }
} else {
    $_SESSION['result'] = "Авторизуйтесь.";
}
