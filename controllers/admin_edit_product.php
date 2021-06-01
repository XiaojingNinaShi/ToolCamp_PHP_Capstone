<?php
$slug = 'admin_edit_product';
require __DIR__ . '/../models/teas_model.php';

if (signedIn() && adminSignedIn()){
    if(empty($_GET['tea']) || !int($_GET['tea'])){
        flashMsg('danger','Please select a product to edit.');
        header('Location:/?page=admin_view_products');
        die;
    }
    
    $product = oneTea($dbh,$_GET['tea']);
    require __DIR__ . '/../views/admin_edit_product.php';
    
}else{
    flashMsg('danger', 'Please sign in as an ADMIN user to view this page.');
    header('Location:/?page=signin');
    die;
}