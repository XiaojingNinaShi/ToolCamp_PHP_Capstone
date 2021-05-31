<?php
    include __DIR__ . '/../models/customer_model.php';
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../models/orders_model.php';
    
    if(empty($_GET['order'])){
        flashMsg('danger','Please select a order.');
        // header('Location:/?page=orders');
        die;
    }
    
    $slug = 'confirm_order';
    $user = getUserByEmail($_SESSION['user']);
    $order = oneOrder($_GET['order']);
    $payment = $_SESSION['payment'];
    
    require __DIR__ . '/../views/confirm_order.php';