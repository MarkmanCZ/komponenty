<?php

if(isset($_POST["submit"])) {
    require_once '../classes/class.register.php';

    $full = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwd_check = $_POST['pwd_check'];

    $register = new Register($full, $email, $username, $pwd, $pwd_check);
    $register->registerUser();
    header("location: ../index.php?error=none");
}else {
    header("location: ../index.php");
}