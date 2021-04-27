<?php
$slug = 'register';
include __DIR__ . '/../views/includes/config.php';
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    //validate data
    $required = array('name','address','city','province','country','postal_code','phone','email','password','confirm_password');
    validateRequired($required, $errors);
    validateAddress('address', $errors);
    validateLength('password', $errors, 8, 255);
    validateLength('phone', $errors, 7,11);
    validateString('city', $errors);
    validateString('province', $errors);
    validateString('country', $errors);
    validatePhone('phone', $errors);
    validateMatch('password', 'confirm_password', $errors);
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'][] = "Email is not valid";
    }

    if(count($errors)){
        //if errors, add them to session
        $_SESSION['errors'] = $errors;
        $_SESSION['post'] = $_POST;  
        //redirect back
        header('location:' . self());
        die;
    }else{
        //if no errors, direct to profile page
        try{
            $insert_id = insertCustomer($dbh,$_POST);
            dd($insert_id);
            if($insert_id){
                $_SESSION['customer_id'] = $insert_id;
                header("location: profile.php");
                die;
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
require __DIR__ . '/../views/register.php';