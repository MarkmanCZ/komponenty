<?php


function getUrl() {
    return $_SERVER['REQUEST_URI'];
}

function getFileName() {
    $url = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    return explode(".", $url)[0];
}

function getTitle() {
    switch(getFileName()) {
        case "index":
            return "Domov";
        case "shop":
            return "Obchod";
        case "about":
            return "O webu";
    }
}

function linkComponent($type) {
    return "obchod.php?komp=" . $type;
}

function showError() {
    $type = $_GET["error"];
    require_once 'errors.php';

    foreach($errors as $key => $value) {
        if($type == $key && !empty($type)) {
            return $value;
        }
        else {
            return "Tato chyba není v registru chyb!";
        }
    }
}