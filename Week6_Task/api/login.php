<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/user.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
session_start();

if (!isset($_POST['username'])) {
    echo (new Response(false, "Please check username and password"))->getJSONResponse();
    return;
}
if (!isset($_POST['password'])) {
    echo (new Response(false, "Please check username and password"))->getJSONResponse();
    return;
}

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == '' || $password == '') {
    echo (new Response(false, "Please enter correct Username & Password"))->getJSONResponse();
} else {
    $loginResponse = (new User())->login($username, $password);
    if ($loginResponse["status"] == true) {
        $_SESSION["userDetails"] = (new Encryption)->encrypt($loginResponse["data"]["id"]);
        echo (new Response(true, "Success"))->getJSONResponse();
    } else {
        echo (new Response(false, $loginResponse["message"]))->getJSONResponse();
    }
}
