<?php
declare(strict_types=1);

/**
 * Return a sanitized string
 *
 * @param string $str
 * @return string
 */
function e(string $str): string
{
    return htmlentities($str, ENT_QUOTES, "UTF-8");
}

/**
 * Return a raw string
 *
 * @param string $str
 * @return string
 */
function raw(string $str): string
{
    return strip_tags($str,'<p><br /><a>');
}

/**
 * display variable info
 *
 * @param mixed $var
 * @return void
 */
function dd($var):void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    // die;
}

/**
 * Redirect to the same page
 *
 * @return void
 */
function self()
{
    return basename($_SERVER['PHP_SELF']);
}

/**
 * test if input is an integer
 *
 * @param string $str
 * @return boolean
 */
function int($str):bool
{
    // return is_numeric($str) ? true : false;
    return (string) intval($str) === $str;
}

/**
 * display error for each field, if there are more than one, display the first one
 *
 * @param string $field
 * @param array $errors
 * @return void
 */
function error($field, &$errors)
{
    if(!empty($errors[$field])){
        return "*{$errors[$field][0]}";
    }else{
        return "";
    }
}

/**
 * test if a user/admin is signed in
 *
 * @return void
 */
function signedIn()
{
    if(!empty($_SESSION['priv_level']) && !empty($_SESSION['user'])) {
        return true;
    }
    return false;
}

/**
 * Check $_SESSION['priv_level']
 *
 * @return void
 */
function userSignedIn()
{
    if($_SESSION['priv_level'] == 2) {
        return true;
    }
    return false;
}

/**
 * Check $_SESSION['priv_level']
 *
 * @return void
 */
function adminSignedIn()
{
    if($_SESSION['priv_level'] == 1) {
        return true;
    }
    return false;
}


/**
 * set flash info in session
 *
 * @param string $class
 * @param string $message
 * @return void
 */
function flashMsg(string $class, string $message)
{
    $_SESSION['flash'][$class] = $message;
}

/**
 * Check if two id are same
 *
 * @param string $id1
 * @param string $id2
 * @return void
 */
function mineOrder(string $id1, string $id2)
{
    if($id1 == $id2) {
        return true;
    }
    return false;
}