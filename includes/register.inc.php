<?php

if(isset($_POST["submit"])) {

    $full = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwd_check = $_POST['pwd_check'];

    require_once 'functions.inc.php';
    require_once '../classes/class.User.php';
    require_once '../classes/class.database.php';
    //check for errors

    //register user
    $user = new User($full, $username, $email, $pwd, 1, "", $pwd);
    $db = new Database();
    $db->register($user);

    header("location: ../index.php?register=success");
}else {
    header("location: ../index.php");
}