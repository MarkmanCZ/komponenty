<?php

function checkEmpty($args)
{
    for($i = 1; $i <= count($args); $i++) {
        if(empty($args[$i])) {
            return true;
        }
        return false;
    }
    return false;
}

function verPwd($pwd): bool
{
    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $pwd)) {
        return true;
    }
    return false;
}

function verEmail($email): bool
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}