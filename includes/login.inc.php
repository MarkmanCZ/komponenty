<?php

if(isset($_POST["submit"])) {

    $login = $_POST['login'];
    $pwd = $_POST['pwd'];

    require_once 'functions.inc.php';
    require_once '../classes/class.User.php';
    //check for errors

    //login user
    $user = new User("", $login, $login, $pwd, 0, "", "");
    $db = new Database();
    echo $db->login($user);
}