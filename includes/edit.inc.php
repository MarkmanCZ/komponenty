<?php

if(isset($_POST['submit'])) {

    require_once '../classes/class.database.php';
    require_once 'functions.inc.php';

    $db = new Database();
    $type_check = $_GET['type'];

    if($type_check === "brand") {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $delete = $_POST['delete'];
        $data = array($id, $name, $delete);

        if(checkEmpty($data)) {
            header("location: ../edit.php?type='.$type_check.'&id='.$id.'&error=emptyinputs");
            exit();
        }

        $db->editBrand($id, $name, $delete);
        header("location: ../vyrobce.php");
        exit();
    }
    if($type_check === "comp") {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $brand = $_POST['brand'];
        $delete = $_POST['delete'];
        $pic = $_POST['pic'];
        $link = $_POST['link'];
        $data = array($id, $name, $type, $brand, $delete, $pic, $link);


        if (checkEmpty($data)) {
            header("location: ../edit.php?type=".$type_check."&id=".$id."&error=emptyinputs");
            exit();
        }


        $db->editComponent($id, $name, $brand, $delete, $pic, $link, $type);
        header("location: ../komponenty.php");
        exit();
    }


}else {
    header("location: ../index.php");
}