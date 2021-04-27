<?php
$slug = 'profile';
include __DIR__ . '/../views/includes/config.php';
if(empty($_SESSION['customer_id'])) die('Please select a existing customer');
//get last added customer
$customer = oneCustomer($_SESSION['customer_id'],$dbh);
require __DIR__ . '/../views/profile.php';