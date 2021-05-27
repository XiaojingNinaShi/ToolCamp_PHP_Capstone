<?php
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../classes/validator.php';
    $user_csrf = $_POST['csrf'] ?? '';
    if($user_csrf !== $_SESSION['csrf']) {
        die('CSRF token mismatch');
    }

    //validate form data
    $v = new Validator($_POST);

    //validate all fields are filled in
    $required = array('name','price','weight','type','caffeine','origin','expire_date','organic','ingredients','description','sku');
    foreach ($required as $field){
        $v->validateRequired($field);
    }
    //validate specific requirement
    $v->validateString('name');
    $v->validateString('origin');
    $v->validateString('ingredients');
    $v->validateString('description');
    $v->validateDecimal('price');
    $v->validateSKU('sku');

    //validate image upload
    $file = $_FILES['image']['tmp_name'];
    if($file){
        $fileinfo = getimagesize($file);
        $mime = $fileinfo['mime'];
        $allowed = array(
            'image/png',
            'image/gif',
            'image/jpg',
            'image/jpeg',
            'image/webp'
        );
        //validate allowed file type
        if(in_array($mime, $allowed)) {
            // Attempt to upload it if we do
            $to = realpath(__DIR__ . '/../public/images/') . '/' . $_FILES['image']['name'];
            $from = $_FILES['image']['tmp_name'];
            if(file_exists($to)) {
                flashMsg('danger','Image already exists.');
            } else {
                if(move_uploaded_file($from, $to)) {
                    $_POST['image'] = $_FILES['image']['name'];
                    flashMsg('success','File was successfully uploaded.');
                } else {
                    flashMsg('danger','There was a problem uploading the file.');
                }
            }
        } else {
            // Set an error if we don't
            flashMsg('danger','Illegal file type: must be valid image.');
        }
    }
    
  
    if(count($v->getErrors())){
        //if errors, add them to session and redirect back
        $_SESSION['errors'] = $v->getErrors();
        $_SESSION['post'] = $_POST;  
        header('location:/?page=admin_add_product');
        die;
    }else{
        //if no errors, direct to admin view products page
        try{
            $insert_id = addTea($dbh,$_POST);
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

