<?php
include __DIR__ . '/../models/teas_model.php';
// if not sign in as an admin user, redirect to sing in page
if(!signedIn() || !adminSignedIn()){
    flashMsg('danger','Please sign in as an ADMIN user.');
    header('Location:/?page=signin');
    die;
}

// if not get tea id, direct to view products page
if(empty($_GET['tea'])){
    flashMsg('danger', 'Please select a product to remove');
    header('Location:/?page=admin_view_products');
    die;
}

// if singed in AND get tea id. Then proceed to edit page
$tea_id = intval($_GET['tea']);
$removed_tea = removeTea($dbh, $tea_id);

if($removed_tea){
    flashMsg('info', 'Item romved.');
}else{
    flashMsg('danger', 'Failed to remove item.');
}

header('Location:/?page=admin_view_products');