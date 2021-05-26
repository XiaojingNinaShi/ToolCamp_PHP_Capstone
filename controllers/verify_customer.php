<?php
include __DIR__ . '/../models/customer_model.php';
// only POST requests allowed
if('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    header('Allow: POST');
    echo '<h1>405 - Method Allowed</h1>';
    echo '<h2>Allowed: POST</h2>';
    die;
}

// test to see user has provided both email and password
// If any one is null, display error message and redirect to log in page
if(empty($_POST['email']) || empty($_POST['password'])) {
    $errors['password'] = 'All fields are required';
    $_SESSION['errors'] = $errors;
    $_SESSION['post'] = $_POST;
    header('Location:/?page=signin');
    die;
};

// If we have user with that email address and the password match database record, sign in and direct to profile page
$user = getUserByEmail($_POST['email']);

// password: MYP@SSWORD1 
// after hashed: $2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m

// if priv_level is 0, verify customer log in, direct to customer profile page
if(($user['priv_level']=='0') && password_verify($_POST['password'], $user['password'])) {  
    $_SESSION['priv_level'] = 0;
    $_SESSION['user'] = $user['email'];
    flashMsg('success', 'You have successfully Signed in!');    
    // redirect to profile page
    $_SESSION['customer_id'] = $user['id'];
    header('Location:/?page=profile');
    die;
} 


// if priv_level is 1, verify admin log in, direct to back end admin page
if(($user['priv_level']=='1') && password_verify($_POST['password'], $user['password'])) {  
    $_SESSION['priv_level'] = 1;
    $_SESSION['user'] = $user['email'];
    flashMsg('success', 'You have successfully Signed in!');    
    // redirect to admin page
    $_SESSION['admin_id'] = $user['id'];
    header('Location:/?page=admin_view_products');
    die;
}

// If not, redirect back to form
flashMsg('danger', 'There was a problem logging you in.');
$errors['password'] = 'The email and password you have provided do not match out records.';
$_SESSION['errors'] = $errors;
$_SESSION['post'] = $_POST;
header('Location:/?page=signin');
die;


