<?php
require __DIR__ . '/../models/teas_model.php';
$slug = 'teas';
if(!empty($_GET['type'])){
    $teas = allTeasbyType($dbh, $_GET['type']);
    $title = 'Shop ' . ucwords($_GET['type']) . ' Tea:';
}elseif(!empty($_GET['caffeine'])){
    $teas = allTeasbyCaffeine($dbh, $_GET['caffeine']);
    $title = 'Shop ' .  ucwords($_GET['caffeine']) . ' Level:';
}else{
    $teas = allTeas($dbh);
    $title = 'Shop All Teas';
}

$types = allTypes($dbh);
$caffeines = allCaffeines($dbh);
require __DIR__ . '/../views/teas.php';