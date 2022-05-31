<?php

if(isset($_POST["submit"])) {
    require_once '../classes/class.login.php';

    $login = $_POST['login'];
    $pwd = $_POST['pwd'];

    $login = new Login($login, $pwd);
    print_r($login->loginUser());
    //$_SESSION["user"] = $login->loginUser();
}