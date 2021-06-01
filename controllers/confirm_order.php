<?php
    include __DIR__ . '/../models/customer_model.php';
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../models/orders_model.php';
    $slug = 'confirm_order';

    // if not sign in, redirect to sign in page
    if(!signedIn() || !userSignedIn()){
        flashMsg('danger','Please sign in.');
        header('Location:/?page=signin');
        die;
    }
    
    // if not get order id, redirect to orders page
    if(empty($_GET['order'])){
        flashMsg('danger','Please select an order to view.');
        header('Location:/?page=orders');
        die;
    }
    
    // After sign in, AND get a order id, check if the order belongs to the customer
    $user = getUserByEmail($_SESSION['user']);
    $order = oneOrder($_GET['order']);
    $payment = $_SESSION['payment'] ?? [];

    $ismyorder = mineOrder($user['id'], $order['customer_id']);
    
    if($ismyorder){
        $_SESSION['bag'] = [];
        require __DIR__ . '/../views/confirm_order.php';
    }else{
        flashMsg('danger','You can only view your own orders. Please select an order in below table.');
        header('Location:/?page=orders');
        die;
    }
    