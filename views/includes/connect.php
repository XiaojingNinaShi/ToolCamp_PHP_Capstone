<?php
define('DB_DSN', 'mysql:host=mariadb;dbname=capstone');
//define('DB_DSN', 'mysql:host=localhost;dbname=capstone');
define('DB_USER', 'nina');
define('DB_PASS', 'nina0908');

//To create a user in MySQL
//mysql -u root;
//create user 'nina'@'%' identified by 'nina0908';
//grant all on movies.* to 'nina'@'%';

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
