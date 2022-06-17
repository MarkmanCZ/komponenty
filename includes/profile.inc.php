<?php
if(isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_check = $_POST['pwd_check'];

    require_once '../classes/class.database.php';
    require_once 'functions.inc.php';

    if(empty($pwd) || empty($pwd_check)) {
        header("location: ../profile.php?error=pwdcheckempty");
        exit();
    }
    else if(verPwd($pwd)) {
        header("location: ../profile.php?error=pwdtext");
        exit();
    }else {
        $user = new User($_SESSION['user_data']->getId(), $full_name, $username, $email, $pwd, $_SESSION['user_data']->getGroup(), $_SESSION['user_data']->getRegisteredAt(), $_SESSION['user_data']->getPwdOld());
        $db = new Database();
        $db->update($user);
        $_SESSION['user_data'] = $user;
        header("location: ../index.php");
        exit();
    }
}