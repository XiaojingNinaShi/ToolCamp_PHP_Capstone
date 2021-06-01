<?php
$slug = 'admin_add_product';
require __DIR__ . '/../models/teas_model.php';

if (signedIn() && adminSignedIn()){
    require __DIR__ . '/../views/admin_add_product.php';
}else{
    flashMsg('danger', 'Please sign in as an ADMIN user to view this page.');
    header('Location:/?page=signin');
    die;
}