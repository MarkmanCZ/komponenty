<?php

if(isset($_POST["submit"])) {

    $login = $_POST['login'];
    $pwd = $_POST['pwd'];

    require_once 'functions.inc.php';
    require_once '../classes/class.User.php';
    require_once '../classes/class.database.php';
    //check for errors

    //login user
    $user = new User(0,"", $login, $login, $pwd, 0, "", "");
    $db = new Database();
    $result = $db->login($user);
    if($result) {
        header("location: ../index.php?userstate=loggeding");
    }
    else if($result === false) {
        header("location: ../login.php?error=wronglogin");
    }
}