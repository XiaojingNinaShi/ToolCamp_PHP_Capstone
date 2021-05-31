<?php
require __DIR__ . '/../models/teas_model.php';
// There are 2 ways to add tea to shopping bag
//(1) from teas page by $_GET: default quantity is 1
//(2) from teainfo page by $_POST
if(empty($_POST['tea_id'])){
    flashMsg('danger','Please select a product to add.');
    header('Location:/?page=teas');
    die;
}

$_SESSION['bag'][$_POST['tea_id']]['qty'] = $_POST['quantity'];

flashMsg('info','Shopping bag updated.');
header('Location:/?page=shoppingbag');
die;