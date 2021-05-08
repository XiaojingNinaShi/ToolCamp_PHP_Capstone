<?php
if(empty($_GET['tea'])){
    flashMsg('danger', 'Please select a user to remove');
    header('Location:/?page=shoppingbag');
    die;
}

$tea_id = intval($_GET['tea']);

unset($_SESSION['bag'][$tea_id]);

flashMsg('info', 'Item romved from shopping bag.');
header('Location:/?page=shoppingbag');
die;