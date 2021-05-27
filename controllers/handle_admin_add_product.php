<?php
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../classes/validator.php';
    $user_csrf = $_POST['csrf'] ?? '';
    if($user_csrf !== $_SESSION['csrf']) {
        die('CSRF token mismatch');
    }

    //validate data
    $v = new Validator($_POST);
    
    // QUESTION HERE: HOW TO UPLOAD IMAGE AND SAVE IT IN DATABASE ???
    // ADD 'image' INTO $required array once figured out


    $required = array('name','price','weight','type','caffeine','origin','expire_date','organic','ingredients','description','sku');
    foreach ($required as $field){
        $v->validateRequired($field);
    }
    $v->validateString('name');
    $v->validateString('origin');
    $v->validateString('ingredients');
    $v->validateString('description');
    $v->validateDecimal('price');
    // $v-validateSKU('sku');
  
    if(count($v->getErrors())){
        //if errors, add them to session
        $_SESSION['errors'] = $v->getErrors();
        $_SESSION['post'] = $_POST;  
        //redirect back
        header('location:/?page=admin_add_product');
        die;
    }else{
        //if no errors, direct to admin view products page
        try{
            $insert_id = addTea($dbh,$_POST);
            // dd($insert_id);
            if($insert_id){
                header('Location:/?page=admin_view_products');
                flashMsg('success', 'You have successfully added a new product into database!');  
                die;
            }
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}

