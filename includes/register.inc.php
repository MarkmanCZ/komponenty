<?php

if(isset($_POST["submit"])) {

    $full = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwd_check = $_POST['pwd_check'];

    require_once 'functions.inc.php';
    require_once '../classes/class.User.php';
    //check for errors

    //register user
    $user = new User($full, $email, $username, $pwd, 1, "", $pwd);
    $db = new Database();
    $db->register($user);

    header("location: ../index.php?error=none");
}else {
    header("location: ../index.php");
}