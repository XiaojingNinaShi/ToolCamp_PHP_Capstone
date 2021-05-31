<?php
$slug = 'admin_view_orders';
include __DIR__ . '/../models/customer_model.php';
include __DIR__ . '/../models/teas_model.php';
include __DIR__ . '/../models/orders_model.php';

$orders = allOrders($dbh);

require __DIR__ . '/../views/admin_view_orders.php';