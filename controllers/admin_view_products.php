<?php
$slug = 'admin_view_products';
include __DIR__ . '/../models/customer_model.php';
include __DIR__ . '/../models/teas_model.php';
// if(empty($_SESSION['admin_id'])) die('Please select a existing user');
//get last added customer
// $admin = oneCustomer($_SESSION['admin_id'],$dbh);
$products = allTeasDetailedOrderById($dbh);

require __DIR__ . '/../views/admin_view_products.php';