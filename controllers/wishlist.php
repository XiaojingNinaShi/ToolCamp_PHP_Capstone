<?php
$slug = 'wishlist';

if (signedIn() && userSignedIn()){
    require __DIR__ . '/../views/wishlist.php';
}else{
    flashMsg('danger', 'Please sign in to view your wish list.');
    header('Location:/?page=signin');
    die;
}