<?php
$slug = 'admin_view_customers';
include __DIR__ . '/../models/customer_model.php';
include __DIR__ . '/../models/teas_model.php';

// if(empty($_SESSION['admin_id'])) die('Please select a existing user');

$customers = allCustomersOrderByDate($dbh);

require __DIR__ . '/../views/admin_view_customers.php';