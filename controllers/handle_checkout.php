<?php
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    include __DIR__ . '/../models/customer_model.php';
    include __DIR__ . '/../models/teas_model.php';
    include __DIR__ . '/../models/orders_model.php';
    include __DIR__ . '/../classes/validator.php';
    
    $user_csrf = $_POST['csrf'] ?? '';
    if($user_csrf !== $_SESSION['csrf']) {
        die('CSRF token mismatch');
    }

    //validate data
    $v = new Validator($_POST);
    $required = array('name_on_card','card_number','expire_date','security_code');
    foreach ($required as $field){
        $v->validateRequired($field);
    }
    $v->validateString('name_on_card');
    $v->validateNumber('card_number');
    $v->validateCardNumber('card_number');
    $v->validateCardExpireDate('expire_date');
    $v->validateNumber('security_code');
    $v->validateSecurityCode('security_code');
  
    if(count($v->getErrors())){
        //if errors, add them to session
        $_SESSION['errors'] = $v->getErrors();
        $_SESSION['post'] = $_POST;  
        //redirect back
        header('location:/?page=checkout');
        die;
    }else{
        // if no errors, save info in SESSION and direct to confirm order page
        try{
            // 1.save payment info into SESSTION
            $payment = [];
            $payment['name_on_card'] = $_POST['name_on_card'];
            $payment['card_number'] = $_POST['card_number'];
            $payment['expire_date'] = $_POST['expire_date'];
            $payment['security_code'] = $_POST['security_code'];
            
            $_SESSION['payment'] = $payment;
            flashMsg('success', 'Payment info saved!');    
            
            // 2. insert order into database
            $order = [];
            // $user = getUserByEmail($_SESSION['user']);
            // $order['customer_id'] = $user['id'];
            $order['customer_id'] = $_SESSION['customer_id'];

            $sum = 0;
            foreach($bag as $item){
                $line_price = $item['qty'] * $item['price'];
                $sum += $line_price;
            }
            
            $order['subtotal'] = number_format($sum,2);
            $order['gst'] = number_format($sum * 0.05,2);
            $order['pst'] = number_format($sum * 0.07,2);
            $order['total'] = number_format($sum * 1.12,2);
            $order['teas'] = $bag;
            
            // dd($order);
            // die;
            
            $order_id = insertOrder($dbh, $order); //return the last insert order id

            if($order_id){
                header('Location:/?page=confirm_order&order='.$order_id);
                die;
            }else{
                header('Location:/?page=checkout');
                die;
            }
            
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
