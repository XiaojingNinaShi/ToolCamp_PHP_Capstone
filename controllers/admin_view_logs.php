<?php
$slug = 'admin_view_logs';
include __DIR__ . '/../models/customer_model.php';
include __DIR__ . '/../models/teas_model.php';

if (signedIn() && adminSignedIn()){
    $log = $logger->get(10);
    require __DIR__ . '/../views/admin_view_logs.php';
}else{
    flashMsg('danger', 'Please sign in as an ADMIN user to view this page.');
    header('Location:/?page=signin');
    die;
}