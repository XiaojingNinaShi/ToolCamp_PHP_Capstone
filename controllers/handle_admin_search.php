<?php
// if not signed in, die
if(!signedIn() || !adminSignedIn()){
    flashMsg('danger','Please sign in as an ADMIN user.');
    header('Location:/?page=signin');
    die;
}
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    include __DIR__ . '/../models/teas_model.php';
    $slug = 'admin_search_teas';
    $search_stem = $_POST['search'] ?? '';
    $products = adminSearchTea($dbh, $search_stem);

    if(count($products)){
        $title = 'Search Result: ' . $search_stem;
    }else{
        $title = 'No product found.';
    }
    
    require __DIR__ . '/../views/admin_view_products.php';
}