<?php
$slug = 'admin_view_logs';
include __DIR__ . '/../models/customer_model.php';
include __DIR__ . '/../models/teas_model.php';

if(empty($_SESSION['admin_id'])){
    die('Please select a existing user');
}

$file = file(__DIR__ . '/../logs/events.log');
$file = array_reverse($file);

// method 1: 
// for($i=0;$i<10;$i++){
//     $line = $file[$i];
//     dd($line);
// }
// die;

// method 2. FAIL. how to read backward? 
// $fh = fopen(__DIR__ . '/../logs/events.log', 'r'); 
// $fh = fopen($file, 'r');
// for($i=0;$i<10;$i++){
//     $line = fgets($fh);
//     dd($line);
// }
// die;
// fclose($fh);
require __DIR__ . '/../views/admin_view_logs.php';