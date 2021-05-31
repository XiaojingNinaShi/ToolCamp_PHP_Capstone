<?php
include __DIR__ . '/views/includes/functions.php';
require __DIR__ . '/classes/Log/ILogger.php';

//Set common site variables
$sitename = 'Nina\'s Tea';

// Start session
ob_start();
session_start();

// Set sessions
if(empty($_SESSION['csrf'])) {
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    $_SESSION['csrf'] = $token;
}

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

// For sign Out: run signedIn function
if(!empty($_GET['signout'])) {
    session_regenerate_id();
    $_SESSION = [];
    flashMsg('info', 'You have signed out!');
    header('Location: /?page=signin');
    die;
}

// BELOW IS THE OLD CODE FOR SIGN OUT. I think it is useless to verify if user has logged in. So I changed it. 

// if(!empty($_GET['signout'])) {
//     if(signedIn()) {
//         session_regenerate_id();
//         $_SESSION = [];
//         flashMsg('info', 'You have signed out!');
//     } else {
//         flashMsg('danger', 'Cannot sign you out because you are not signed in!');  
//     }
//     header('Location: /?page=signin');
//     die;
// }

// For logs: define LOGGER file/database (either one)
define('LOGGER', 'file');
// define('LOGGER', 'database');

if(LOGGER === 'file'){
    require __DIR__ . '/classes/Log/FileLogger.php';
    $fh = fopen(__DIR__ . '/logs/events.log', 'a');
    $logger = new FileLogger($fh);
}elseif(LOGGER === 'database'){
    require __DIR__ . '/classes/Log/DatabaseLogger.php';
    $logger = new DatabaseLogger($dbh);
}
