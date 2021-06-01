<?php
    include __DIR__ . '/../models/customer_model.php';
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../models/orders_model.php';
    $slug = 'orders';
    if(signedIn() && userSignedIn()){
        $orders = allOrdersForOneCustomer($_SESSION['customer_id']);
        require __DIR__ . '/../views/orders.php';
    }else{
        flashMsg('danger','Please sign in to view your orders.');
        header('Location:/?page=signin');
        die;
    }