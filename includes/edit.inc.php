<?php

if(isset($_POST['submit'])) {

    require_once '../classes/class.database.php';

    $db = new Database();

    switch ($_GET['type']) {
        case "brand":
            $id = $_GET['id'];
            $name = $_POST['name'];
            $delete = $_POST['delete'];

            $db->editBrand($id, $name, $delete);
            header("location: ../vyrobce.php");
        case "comp":
            $id = $_GET['id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $brand = $_POST['brand'];
            $delete = $_POST['delete'];
            $pic = $_POST['pic'];
            $link = $_POST['link'];

            $db->editComponent($id, $name, $brand, $delete, $pic, $link, $type);
            //header("location: ../komponenty.php");

    }


}else {
    header("location: ../index.php");
}