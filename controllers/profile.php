<?php
$slug = 'profile';
include __DIR__ . '/../models/customer_model.php';

if (signedIn() && userSignedIn()){
    $customer = oneCustomer($_SESSION['customer_id'],$dbh);
    require __DIR__ . '/../views/profile.php';
}else{
    flashMsg('danger', 'Please sign in to view your profile.');
    header('Location:/?page=signin');
    die;
}