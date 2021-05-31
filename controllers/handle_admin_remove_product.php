<?php
include __DIR__ . '/../models/teas_model.php';
if(empty($_GET['tea'])){
    flashMsg('danger', 'Please select a product to remove');
    header('Location:/?page=admin_view_products');
    die;
}

$tea_id = intval($_GET['tea']);
$removed_tea = removeTea($dbh, $tea_id);

if($removed_tea){
    flashMsg('info', 'Item romved.');
}else{
    flashMsg('danger', 'Failed to remove item.');
}

header('Location:/?page=admin_view_products');