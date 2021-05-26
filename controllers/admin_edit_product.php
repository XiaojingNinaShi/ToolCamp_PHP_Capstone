<?php
$slug = 'admin_edit_product';
require __DIR__ . '/../models/teas_model.php';

if(empty($_GET['tea'])){
    flashMsg('danger','Please select a product to edit.');
    header('Location:/?page=admin_view_products');
    die;
}

require __DIR__ . '/../views/admin_edit_product.php';