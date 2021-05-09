<?php

// Create your Validator class here
class Validator
{
  /**
   * Array of key/values to be validated
   *
   * @var array
   */
  private $array;
  /**
   * array to hold error messages
   *
   * @var array
   */
  private $errors;

  public function __construct (array $arr)
  {
    $this->array = $arr;
  }

  /**
   * validate all required fiels
   *
   * @param string $field
   * @return void
   */
  public function validateRequired(string $field):void
  {
    if(empty($this->array[$field])){
      $this->errors[$field][] = "$field is a required field.";
    }
  }

  /**
   * validate if input is a string
   *
   * @param string $field
   * @return void
   */
  public function validateString(string $field):void
  {
    if($this->array[$field] !== htmlentities($this->array[$field],ENT_QUOTES,"UTF-8")){
      $this->errors[$field][] = "$field contains invalid characters.";
    }
  }

  /**
   * validate if input is a number
   *
   * @param string $field
   * @return void
   */
  public function validateNumber(string $field):void
  {
    if(!filter_var($this->array[$field], FILTER_VALIDATE_INT)){
      $this->errors[$field][] = "$field must be a number.";
    }
  }

  /**
   * validate email by filter_var
   *
   * @param string $field
   * @return void
   */
  public function validateEmail(string $field):void
  {
    if(!filter_var($this->array[$field], FILTER_VALIDATE_EMAIL)){
      $this->errors[$field][] = "$field is not valid.";
    }
  }

/**
 * check if the email is unique( means it is different from all emails in database)
 *
 * @param string $field
 * @return void
 */
  public function validateUnique(string $field):void
  {
    if(getUserByEmail($this->array[$field])){
      $this->errors[$field][] = "$field is already exist. Please log in or use another email address to register";
    }
  }

  /**
   * validate phone number: North American phone number format
   *
   * @param string $field
   * @return void
   */
  public function validatePhone(string $field):void
  {
    $pattern_phone = "/^[\d]{3}[-\.\s]?[\d]{3}[-\.\s]?[\d]{4}$/";
    if(!preg_match($pattern_phone, $this->array[$field])){
        $this->errors[$field][] = "$field is not valid.";
    }
  }

/**
 * validate address: can contain letters, numebrs, empty string, dash and period.
 *
 * @param string $field
 * @return void
 */
  function validateAddress(string $field):void
{
    $pattern_address = "/^[A-Za-z0-9\ \-\,\.]+$/";
    if(!preg_match($pattern_address, $this->array[$field])){
        $this->errors[$field][] = "$field is not valid.";
    }
}

  /**
   * validate postal code: Canadian postal code format
   *
   * @param string $field
   * @return void
   */
  public function validatePostalCode(string $field):void
  {
    $pattern_postal_code = "/^[A-z]{1}[\d]{1}[A-z]{1}\s?[\d]{1}[A-z]{1}[\d]{1}$/";
    if(!preg_match($pattern_postal_code, $this->array[$field])){
        $this->errors[$field][] = "$field is not valid.";
    }
  }
 
  /**
   * validate password: at least 8 characters long, at least one uppercase letter, one number, one special character
   *
   * @param string $field
   * @return void
   */
  public function validatePassword(string $field):void
  {
    
    $pattern_password = "/(?=.*[A-Z])(?=.*[\d])(?=.*[!@#$%^&*-])^.{8,}$/";
    if(!preg_match($pattern_password, $this->array[$field])){
        $this->errors[$field][] = "$field must be at least 8 characters long, and contain at least one special character, one uppercase letter and one number.";
    }
  }

  /**
   * display all errors
   *
   * @return array $errors
   */
  public function getErrors()
  {
    return $this->errors;
  }
}