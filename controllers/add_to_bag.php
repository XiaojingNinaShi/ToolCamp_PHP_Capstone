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

$tea = oneTea($dbh, intval($_POST['tea_id']));
// Method 1:
// $_SESSION['bag'][$tea['id']] = $tea;
// $item['qty'] = $_POST['quantity'];

// Method 2:
$item=[];
$item['id'] = $tea['id'];
$item['image'] = $tea['image'];
$item['name'] = $tea['name'];
$item['price'] = $tea['price'];
$item['qty'] = $_POST['quantity'];

$_SESSION['bag'][$tea['id']] = $item;
// Method3: or make a class --- next step

flashMsg('info','Product added to shopping bag.');
header('Location:/?page=teainfo&tea='.$tea['id']);
die;