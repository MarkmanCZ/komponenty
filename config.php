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
    return "shop.php?komp=" . $type;
}
