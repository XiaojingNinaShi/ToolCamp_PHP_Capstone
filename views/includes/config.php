<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$_SESSION['errors'] = [];

$post = $_SESSION['post'] ?? [];
$_SESSION['post'] = [];

include __DIR__ . '/connect.php';
include __DIR__ . '/functions.php';
include __DIR__ . '/customer_model.php';
include __DIR__ . '/validator.php';
