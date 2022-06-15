<?php

if(isset($_POST['submit'])) {
    echo $id = $_POST['id'];

    require_once '../classes/class.database.php';

    $db = new Database();
    $db->deleteBrand($id);
    header("location: ../vyrobce.php");
    exit();
}