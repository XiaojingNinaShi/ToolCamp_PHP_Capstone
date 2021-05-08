<?php
include __DIR__ . '/views/includes/functions.php';
//Set common site variables
$sitename = 'Nina\'s Tea';

// Start session
ob_start();
session_start();

// Set sessions
$errors = $_SESSION['errors'] ?? [];
$_SESSION['errors'] = [];

$post = $_SESSION['post'] ?? [];
$_SESSION['post'] = [];

$flash = $_SESSION['flash'] ?? [];
$_SESSION['flash'] = [];

$bag = $_SESSION['bag'] ?? [];

$wish_list = $_SESSION['wish_list'] ?? [];

// Set error reporting
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

//To create a user in MySQL
//mysql -u root;
//create user 'nina'@'%' identified by 'nina0908';
//grant all on movies.* to 'nina'@'%';

// Create database connection
// define('DB_DSN', 'mysql:host=mariadb;dbname=capstone');
define('DB_DSN', 'mysql:host=localhost;dbname=capstone');
define('DB_USER', 'nina');
define('DB_PASS', 'nina0908');
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(Exception $e) {
    echo '<pre>';
    print_r($e->getTrace());
    echo '</pre>';
}


if(!empty($_GET['signout'])) {
    if(signedIn()) {
        session_regenerate_id();
        $_SESSION = [];
        flashMsg('info', 'You have signed out!');
    } else {
        flashMsg('danger', 'Cannot sign you out because you are not logged in!');  
    }
    header('Location: /?page=signin');
    die;
}

