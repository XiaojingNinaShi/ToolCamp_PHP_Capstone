<?php
$slug = 'checkout';
// check if user has signed in
// if not signed in, direct to sign in page
// if signed in, direct to checkout page to collect payment info

if (signedIn() && userSignedIn()){
    require __DIR__ . '/../views/checkout.php';
}else{
    flashMsg('danger','Please sign in to proceed to checkout.');
    header('Location:/?page=signin');
    die;
}