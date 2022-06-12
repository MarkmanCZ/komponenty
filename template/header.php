<?php
    include './classes/class.User.php';
    include_once 'config.php';
    session_start();

    if(isset($_SESSION['user_data']) ? $user = $_SESSION['user_data'] : null);
?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MV Shop: <?= getTitle(); ?></title>
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.min.css">
</head>
<body>

    <?php include 'navbar.php';?>
