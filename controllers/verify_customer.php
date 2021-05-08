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

// NEED TO CHANGE DATABASE PASSWORD AND PASSWORD_HASH PASSWORD ON REGISTER PAGE FOR NEW INPUT PASSWORD
// password: MYP@SSWORD1 
// after hashed: $2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m
if($user && password_verify($_POST['password'], $user['password'])) {  
    $_SESSION['priv_level'] = 2;
    $_SESSION['user'] = $user['email'];
    flashMsg('success', 'You have successfully Signed in!');    
    // redirect to profile page
    $_SESSION['customer_id'] = $user['id'];
    header('Location:/?page=profile');
    die;
}

// If not, redirect back to form
flashMsg('danger', 'There was a problem logging you in.');
$errors['password'] = 'The email and password you have provided do not match out records.';
$_SESSION['errors'] = $errors;
$_SESSION['post'] = $_POST;
header('Location:/?page=signin');
die;


