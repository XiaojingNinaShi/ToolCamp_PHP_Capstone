<?php
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    include __DIR__ . '/../models/customer_model.php';
    include __DIR__ . '/../classes/validator.php';
    
    $user_csrf = $_POST['csrf'] ?? '';
    if($user_csrf !== $_SESSION['csrf']) {
        die('CSRF token mismatch');
    }

    //validate data
    $v = new Validator($_POST);
    $required = array('name','address','city','province','country','postal_code','phone','email','password','confirm_password');
    foreach ($required as $field){
        $v->validateRequired($field);
    }
    $v->validateString('name');
    $v->validateAddress('address');
    $v->validateString('city');
    $v->validateString('province');
    $v->validateString('country');
    $v->validatePostalCode('postal_code');
    $v->validatePhone('phone');
    $v->validateEmail('email');

    //Test 
    $user=getUserByEmail($_POST['email']);
    $v->validateUnique('email',$user);

    $v->validatePassword('password');
  
    if(count($v->getErrors())){
        //if errors, add them to session
        $_SESSION['errors'] = $v->getErrors();
        $_SESSION['post'] = $_POST;  
        //redirect back
        // header('location:' . self());
        header('location:/?page=register');
        die;
    }else{
        //if no errors, direct to profile page
        try{
            $insert_id = insertCustomer($dbh,$_POST);
            // dd($insert_id);
            if($insert_id){
                $_SESSION['priv_level'] = 2;
                $_SESSION['user'] = $_POST['email'];
                flashMsg('success', 'You have successfully Registered!');    
                // redirect to profile page
                $_SESSION['customer_id'] = $insert_id;
                header('Location:/?page=profile');
                die;
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
