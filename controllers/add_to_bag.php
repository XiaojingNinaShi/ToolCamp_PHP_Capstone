<?php
require __DIR__ . '/../models/teas_model.php';
// There are 2 ways to add tea to shopping bag
//(1) from teas page by $_GET: default quantity is 1
//(2) from teainfo page by $_POST
if(empty($_POST['tea_id']) && empty($_GET['tea_id'])){
    flashMsg('danger','Please select a product to add.');
    header('Location:/?page=teas');
    die;
}

//if get tea_id from POST method(from teasinfo page), stay on teasinfo page
if($_POST['tea_id']){
    $tea = oneTea($dbh, intval($_POST['tea_id']));
}
//if get tea_id from GET method(from teas page), stay on teas page
if($_GET['tea_id']){
    $tea = oneTea($dbh, intval($_GET['tea_id']));
}

// save bag info into $_SESSION['bag']
$item=[];
$item['id'] = $tea['id'];
$item['image'] = $tea['image'];
$item['name'] = $tea['name'];
$item['price'] = $tea['price'];
$item['qty'] = $_POST['quantity'] ?? 1;  //set default quantity to 1 

$_SESSION['bag'][$tea['id']] = $item;

flashMsg('info','Product added to shopping bag.');

//if get tea_id from POST method(from teasinfo page), stay on teasinfo page
if($_POST['tea_id']){
    header('Location:/?page=teainfo&tea='.$tea['id']);
    die;
}
//if get tea_id from GET method(from teas page), stay on teas page
if($_GET['tea_id']){
    header('Location:/?page=teas');
    die;
}

