<?php
$slug = 'add_to_wish_list';
require __DIR__ . '/../models/teas_model.php';

// There are 2 ways to add tea to wishlist
//(1) from teas page by $_GET['tea_id]: default quantity is 1
//(2) from teainfo page by $_GET['tea]
if(empty($_GET['tea']) && empty($_GET['tea_id'])){
    flashMsg('danger','Please select a product to add.');
    header('Location:/?page=teas');
    die;
}

// if get from teas page
if($_GET['tea_id']){
    $tea = oneTea($dbh, $_GET['tea_id']);
}
// if get from teainfo page
if($_GET['tea']){
    $tea = oneTea($dbh, $_GET['tea']);
}

// save wishlist items info into $_SESSION['wish_list']
$item=[];
$item['id'] = $tea['id'];
$item['name'] = $tea['name'];
$item['price'] = $tea['price'];
$item['image'] = $tea['image'];

$_SESSION['wish_list'][$tea['id']] = $item;
flashMsg('info','Product added to wish list.');

// if get from teas page, stay on teas page
if($_GET['tea_id']){
    header('Location:/?page=teas');
    die;
}
// if get from teasinfo page, stay on teasinfo page
if($_GET['tea']){
    header('Location:/?page=teainfo&tea='.$tea['id']);
    die;
}
