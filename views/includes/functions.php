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
 * @param [type] $str
 * @return boolean
 */
function int($str):bool
{
    // return is_numeric($str) ? true : false;
    return (string) intval($str) === $str;
}

function error($field, &$errors)
{
    if(!empty($errors[$field])){
        return "*{$errors[$field][0]}";
    }else{
        return "";
    }
}

/**
 * test if user signed in
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