<?php

function error($field, &$errors)
{
    if(!empty($errors[$field])){
        return "<div class='invalid-feedback'>*{$errors[$field][0]}</div>";
    }else{
        return "";
    }
}

function label($field)
{
    return ucwords(str_replace("_", " ", $field));
}


function validateRequired($required, &$errors)
{
    foreach($required as $key){
        if(empty($_POST[$key])){
            $errors[$key][] = label($key) . ' is a required field.';
        }
    }
}

function validateString($field, &$errors)
{
    if(e($_POST[$field]) !== $_POST[$field]){
        $errors[$field][] = lable($field) . ' must not contain' . e('< > & \' "') . 'characters';
    }
    
}

function validateLength($field, &$errors, $min=1, $max=255)
{
    if(strlen($_POST[$field]) < $min || strlen($_POST[$field]) > $max){
        $errors[$field][] = label($field) . " must be between $min and $max characters in length";
    }
}

function validateInteger($field, &$errors)
{
    if(!filter_var($_POST[$field], FILTER_VALIDATE_INT)){;
        $errors[$field][] = lable($field) . ' must be an integer';
    }
}


function validateAddress($field, &$errors)
{
    $pattern_address = "/^[A-Za-z0-9\ \-\,\.]+$/";
    if(!preg_match($pattern_address, $_POST[$field])){
        $errors[$field][] = label($field) . ' is not valid.';
    }
}

function validatePhone($field, &$errors)
{
    $pattern_phone = "/^[0-9\ \-\.]+$/";
    if(!preg_match($pattern_phone, $_POST[$field])){
        $errors[$field][] = label($field) . ' is not valid. It can only contain numbers, dash(-) or period(.) symbol';
    }
}

function validatePostalCode($field, &$errors)
{
    $pattern_postal_code = "/^[A-Za-z0-9\ ]+$/";
    if(preg_match($pattern_postal_code, $_POST[$field])){
        $errors[$field][] = label($field) . ' is not valid.';
    }
}


function validateMatch($field1,$field2, &$errors)
{
    if($_POST[$field1] !== $_POST[$field2]){
        $errors[$field2][] = label($field1) . ' are not matching.';
    }
}

