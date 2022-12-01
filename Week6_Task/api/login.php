<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/user.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/session.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

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
        $sessionResponse = (new Session())->addToken(session_id(), $loginResponse["data"]["id"]);
        if ($sessionResponse["status"] == true) {
            $_SESSION["userDetails"] = (new Encryption)->encrypt($loginResponse["data"]["id"]);
            $_SESSION["userName"] = $loginResponse["data"]["name"];
            echo (new Response(true, "Success"))->getJSONResponse();
        } else {
            echo (new Response(false, $sessionResponse["message"]))->getJSONResponse();
        }
    } else {
        echo (new Response(false, $loginResponse["message"]))->getJSONResponse();
    }
}
