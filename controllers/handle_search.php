<?php
//if we have a POST request
if('POST' === $_SERVER['REQUEST_METHOD']){
    include __DIR__ . '/../models/teas_model.php';
    $slug = 'search_teas';
    $search_stem = $_POST['search'] ?? '';
    $teas = searchTea($dbh, $search_stem);

    if(count($teas)){
        $title = 'Search Result: ' . $search_stem;
    }else{
        $title = 'No product found.';
    }
    
    $types = allTypes($dbh);
    $caffeines = allCaffeines($dbh);
    require __DIR__ . '/../views/teas.php';
}