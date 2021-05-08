<!doctype html>
<html lang="en">
<head>
  <title><?=$sitename?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no,minimal-ui,viewport-fit=cover">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
  
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
  <?php elseif($slug==='register') : ?>
    <link rel="stylesheet" href="css/register.css"/> 
  <?php elseif($slug==='profile') : ?>
    <link rel="stylesheet" href="css/profile.css"/> 
  <?php elseif($slug==='signin') : ?>
    <link rel="stylesheet" href="css/signin.css"/> 
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
<!-- flash message goes in the top -->
<?php include __DIR__ . '/flash.php';?>
  <div class="container">
    <header>
      <!--Logo, login icon and shopping bag icon-->
      <?php require realpath(__DIR__ . '/logo.inc.php'); ?>
      <!--Main navigation-->
      <?php require realpath(__DIR__ . '/nav.inc.php'); ?>
    </header>