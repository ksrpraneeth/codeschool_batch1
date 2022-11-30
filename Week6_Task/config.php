<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/session.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
if(!isset($_SESSION)){
    session_start();
}
function checkSession()
{
    $session_id = session_id();
    $user_id = (new Encryption())->decrypt($_SESSION["userDetails"]);
    $sessionResponse = (new Session())->checkToken($session_id, $user_id);
    $expiryTime = Date($sessionResponse["data"]["expiry_time"]);
    if ($sessionResponse["status"] == false) {
        header("location: logout.php");
        return false;
    } else {
        if ($sessionResponse["data"] == false) {
            header("location: logout.php");
            return false;
        } else {
            if ($expiryTime < date('Y-m-d H:i:s')) {
                header("location: logout.php");
                return false;
            }
            return true;
        }
    }
}
