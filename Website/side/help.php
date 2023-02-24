<?php
//Functions
function checkEmptyStr($var1)
{
    if (!empty($var1)) {
        $trim_text = trim($var1);
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return "";
}

function checkEmptyEmail($var1)
{
    if (!empty($var1)) {
        $trim_text = trim($var1);
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
    return "";
}

function checkSession()
{
    session_start();
    if (!isset($_SESSION["logged"])) {
        session_destroy();
    }
    if (isset($_SESSION["logged"]) && $_SESSION["logged"] != true) {
        session_destroy();
    }
}
