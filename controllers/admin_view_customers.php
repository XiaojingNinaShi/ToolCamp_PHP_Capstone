<?php
$slug = 'admin_view_customers';
include __DIR__ . '/../models/customer_model.php';
include __DIR__ . '/../models/teas_model.php';

if (signedIn() && adminSignedIn()){
    $customers = allCustomersOrderByDate($dbh);
    require __DIR__ . '/../views/admin_view_customers.php';
}else{
    flashMsg('danger', 'Please sign in as an ADMIN user to view this page.');
    header('Location:/?page=signin');
    die;
}