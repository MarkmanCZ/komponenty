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
            $name = $_POST['type'];
            $brand = $_POST['brand'];
            $delete = $_POST['delete'];

    }


}else {
    header("location: ../index.php");
}