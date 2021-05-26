<?php
$slug = 'admin_remove_product';
require __DIR__ . '/../models/teas_model.php';
if(empty($_GET['tea'])){
    flashMsg('danger','Please select a product to remove.');
    header('Location:/?page=admin_view_products');
    die;
}