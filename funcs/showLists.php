<div id="first-content-on-page" class="inner-shadow brad20 p20 flex g10">
    <?php
    include("listGenerator.php");
    function taxistLists($user)
    {
        $query = "SELECT orders.id,
    user_taxist.name AS taxist, 
    user_client.name AS client, 
    street_from.name AS `from_street_str`, 
    street_to.name AS `to_street_str`, 
    house_from.street AS `from_street`, 
    house_to.street AS `to_street`, 
    house_from.house AS `from_house`, 
    house_to.house AS `to_house`,  
    orders.weight,
    orders.cost,
    statuses.name AS `status`
    
    FROM orders
    
    LEFT JOIN taxists ON orders.taxist = taxists.id
    LEFT JOIN users AS user_taxist ON taxists.user = user_taxist.id
    INNER JOIN users AS user_client ON orders.client = user_client.id
    INNER JOIN statuses ON orders.status = statuses.id
    INNER JOIN houses AS house_from ON orders.from = house_from.id
    INNER JOIN houses AS house_to ON orders.to = house_to.id
    INNER JOIN streets AS street_from ON house_from.street = street_from.id
    INNER JOIN streets AS street_to ON house_to.street = street_to.id
    
    WHERE `orders`.`status` = 1";
        $newOrders = selectFrom($query, "ALL");
    ?>
        <div class="list flex column g10 wcenter">
            <h2>Новые заказы:</h2>
            <?php
            if (!empty($newOrders)) {
                foreach ($newOrders as $newOrder) {
                    generateListItem($newOrder, "order");
                }
            } else {
            ?>
                <p>Новых заказов пока нет.</p>
            <?php
            }
            ?>
        </div>
        <?php
        $query = "SELECT orders.id,
    user_taxist.name AS taxist, 
    user_client.name AS client, 
    street_from.name AS `from_street_str`, 
    street_to.name AS `to_street_str`, 
    house_from.street AS `from_street`, 
    house_to.street AS `to_street`, 
    house_from.house AS `from_house`, 
    house_to.house AS `to_house`,  
    orders.weight,
    orders.cost,
    statuses.name AS `status`
    
    FROM orders
    
    LEFT JOIN taxists ON orders.taxist = taxists.id
    LEFT JOIN users AS user_taxist ON taxists.user = user_taxist.id
    INNER JOIN users AS user_client ON orders.client = user_client.id
    INNER JOIN statuses ON orders.status = statuses.id
    INNER JOIN houses AS house_from ON orders.from = house_from.id
    INNER JOIN houses AS house_to ON orders.to = house_to.id
    INNER JOIN streets AS street_from ON house_from.street = street_from.id
    INNER JOIN streets AS street_to ON house_to.street = street_to.id
    
    WHERE `user_taxist`.`id` = '" . $user['id'] . "'";
        $yourOrders = selectFrom($query, "ALL");
        ?>
        <div class="list flex column g10 wcenter">
            <h2>Вы принимали участие:</h2>
            <?php
            if (!empty($yourOrders)) {
                foreach ($yourOrders as $yourOrder) {
                    generateListItem($yourOrder, "order");
                }
            } else {
            ?>
                <p>Вы ещё не выполнили ни одного заказа.</p>
            <?php
            }
            ?>
        </div>
    <?php
    }
    function userList($user)
    {
        $query = "SELECT orders.id,
        user_taxist.name AS taxist, 
        user_client.name AS client, 
        street_from.name AS `from_street_str`, 
        street_to.name AS `to_street_str`, 
        house_from.street AS `from_street`, 
        house_to.street AS `to_street`, 
        house_from.house AS `from_house`, 
        house_to.house AS `to_house`,  
        orders.weight,
        orders.cost,
        statuses.name AS `status`
        
        FROM orders
        
        LEFT JOIN taxists ON orders.taxist = taxists.id
        LEFT JOIN users AS user_taxist ON taxists.user = user_taxist.id
        INNER JOIN users AS user_client ON orders.client = user_client.id
        INNER JOIN statuses ON orders.status = statuses.id
        INNER JOIN houses AS house_from ON orders.from = house_from.id
        INNER JOIN houses AS house_to ON orders.to = house_to.id
        INNER JOIN streets AS street_from ON house_from.street = street_from.id
        INNER JOIN streets AS street_to ON house_to.street = street_to.id

        WHERE `user_client`.`id` = '" . $user['id'] . "'";

        $yourOrders = selectFrom($query, "ALL");
    ?>
        <div class="list flex column g10 wcenter">
            <h2>Ваши заказы:</h2>
            <?php
            if (!empty($yourOrders)) {
                foreach ($yourOrders as $yourOrder) {
                    generateListItem($yourOrder, "order");
                }
            } else {
            ?>
                <p>Вы не сделали ни единого заказа.</p>
            <?php
            }
            ?>
        </div>
    <?php
    }
    switch ($user['role']) {
        case 2:
            taxistLists($user);
            userList($user);
            break;
        case 3:
        case 1:
            userList($user);
            break;
    }
