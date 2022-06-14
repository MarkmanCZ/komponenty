<?php

function checkEmpty($args): bool
{
    foreach($args as $value) {
        if(empty($value)) {
            return true;
        }
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