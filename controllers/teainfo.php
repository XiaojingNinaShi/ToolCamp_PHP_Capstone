<?php
$slug = 'teainfo';
include __DIR__ . '/../models/teas_model.php';
if(empty($_GET['tea'])) die ('Please select a product.');
if(!int($_GET['tea'])) die ('Product id must be an integer.');
//get one tea
$tea = oneTea($dbh, $_GET['tea']);
require __DIR__ . '/../views/teainfo.php';