<?php include __DIR__ . '/../../../config.php';?>  
<!doctype html>
<html lang="en">
<head>
  <title><?=$sitename?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui,viewport-fit=cover">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/main.css" media="screen and (min-width:768px)" />
  
  <?php if($slug==='home') : ?>
    <link rel="stylesheet" href="css/home.css"/>   
  <?php elseif($slug==='teas') : ?>
    <link rel="stylesheet" href="css/teas.css"/> 
  <?php elseif($slug==='rewards') : ?>
    <link rel="stylesheet" href="css/rewards.css"/> 
  <?php elseif($slug==='shipment') : ?>
    <link rel="stylesheet" href="css/shipment.css"/> 
  <?php elseif($slug==='contact') : ?>
    <link rel="stylesheet" href="css/contact.css"/> 
  <?php endif; ?>
</head>
<!--
****************************************                               
****************************************                               
** Xiaojing Shi (Nina)           (    **
**                               )\   **
**  _  _       _                ((_)  **    
** | \| |     (_)     _ _      __ _   **
** | .` |     | |    | ' \    / _` |  **
** |_|\_|    _|_|_   |_||_|   \__,_|  **   
* _|"""""| _|"""""| _|"""""| _|"""""| **
* "`-0-0-' "`-0-0-' "`-0-0-' "`-0-0-' **
****************************************
****************************************
-->
<body>

  <div class="container">
    <header>
      <!--Logo, login icon and shopping bag icon-->
      <?php require realpath(__DIR__ . '/logo.inc.php'); ?>
      <!--Main navigation-->
      <?php require realpath(__DIR__ . '/nav.inc.php'); ?>
    </header>