<?php
require __DIR__ . '/../models/teas_model.php';
if(empty($_GET['tea'])){
    flashMsg('danger','Please select a product to add.');
    header('Location:/?page=teas');
    die;
}

$tea = oneTea($dbh, $_GET['tea']);

// Method 1:
// $_SESSION['bag'][$tea['id']] = $tea;
// $item['qty'] = $_POST['quantity'];

// Method 2:
$item=[];
$item['id'] = $tea['id'];
$item['name'] = $tea['name'];
$item['price'] = $tea['price'];
$item['image'] = $tea['image'];

$_SESSION['wish_list'][$tea['id']] = $item;
// Method3: or make a class --- next step

flashMsg('info','Product added to wish list.');
header('Location:/?page=teainfo&tea='.$tea['id']);
die;