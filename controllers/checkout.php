<?php
$slug = 'checkout';
// check if user has signed in
// if not signed in, direct to sign in page
if(empty($_SESSION['user'])){
    flashMsg('danger','Please sign in to proceed to checkout.');
    header('Location:/?page=signin');
    die;
}

// if signed in, direct to checkout page to collect payment info
require __DIR__ . '/../views/checkout.php';