<?php
    include __DIR__ . '/../models/customer_model.php';
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../models/orders_model.php';

    $slug = 'orders';
    // $user = getUserByEmail($_SESSION['user']);
    // $orders = allOrdersForOneCustomer($user['id']);
    $orders = allOrdersForOneCustomer($_SESSION['customer_id']);
    require __DIR__ . '/../views/orders.php';