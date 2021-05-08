<?php
if(empty($_GET['tea'])){
    flashMsg('danger', 'Please select a product to remove');
    header('Location:/?page=wishlist');
    die;
}

$tea_id = intval($_GET['tea']);

unset($_SESSION['wish_list'][$tea_id]);

flashMsg('info', 'Item romved from wish list.');
header('Location:/?page=wishlist');
die;