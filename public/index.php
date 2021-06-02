<?php
try{
    require realpath (__DIR__ .'/../config.php');
    date_default_timezone_set("America/Winnipeg");

    // run LogEvent function
        function LogEvent(ILogger $logger)
        {
            $date = date("Y-m-d") ;
            $time = date("h:i:sa") ;
            $resonse_code = http_response_code();

            $event = $date .' | '. $time .' | '. $_SERVER['REQUEST_METHOD'] .' | '. $resonse_code .' | '. $_SERVER['REQUEST_URI'] .' | '. $_SERVER['HTTP_USER_AGENT'] . "\n";

            $logger->write($event);
        }
    
        
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
        'orders',
        'wishlist',
        'add_to_wish_list',
        'remove_from_wish_list',
        'admin_view_products',
        'admin_add_product',
        'handle_admin_add_product',
        'admin_edit_product',
        'handle_admin_edit_product',
        'admin_remove_product',
        'handle_admin_remove_product',
        'handle_admin_search',
        'admin_view_customers',
        'admin_view_orders',
        'admin_view_logs',
        'signin',
        'verify_customer',
        'shoppingbag',
        'add_to_bag',
        'update_bag',
        'remove_from_bag',
        'handle_search',
        'checkout',
        'handle_checkout',
        'confirm_order'
    );

    // if no page defined, set page to home (default)
    $_GET['page'] = $_GET['page'] ?? 'index';

    // Make sure provided page is allowed
    if(!in_array($_GET['page'], $allowed)) {
        $title = '404 - Not Found';
        $slug='404';
        http_response_code(404);
        logEvent($logger);
        require __DIR__ .'/../views/404.php';
        die;
    }

    logEvent($logger);

    $path = __DIR__ . '/../controllers/' . $_GET['page'] . '.php';

    if(!file_exists($path)){
        throw new Exception('View not found');
    }

    require $path;

}catch(Exception $e){
    print_r($e->getMessage());
}