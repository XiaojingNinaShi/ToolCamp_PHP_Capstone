<?php
try{
    require realpath (__DIR__ .'/../config.php');
    // dd($dbh);
    // Only job of this file (the front controller) is to delegate control to another controller
    // We need to limit what the user can request
    $allowed = array(
        'index',
        'teas',
        'teainfo',
        'rewards',
        'shipment',
        'contact',
        'register',
        'handle_register',
        'profile',
        'signin',
        'verify_customer',
        'shoppingbag',
        'add_to_bag',
        'remove_from_bag',
        'wishlist',
        'add_to_wish_list',
        'remove_from_wish_list'
    );

    // if no page defined, set page to home (default)
    $_GET['page'] = $_GET['page'] ?? 'index';

    // Make sure provided page is allowed
    if(!in_array($_GET['page'], $allowed)) {
        $title = '404 - Not Found';
        $slug='404';
        http_response_code(404);
        require __DIR__ .'/../views/404.php';
        die;
    }

    $path = __DIR__ . '/../controllers/' . $_GET['page'] . '.php';
    if(!file_exists($path)){
        throw new Exception('View not found');
    }

    require $path;
}catch(Exception $e){
    dd($e->getTrace());
}