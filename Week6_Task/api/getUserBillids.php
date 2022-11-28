<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";
session_start();
if (!isset($_SESSION['userDetails'])) {
    echo (new Response(false, "User ID is missing"))->getJSONResponse();
    return;
}

$userID = (new Encryption())->decrypt($_SESSION['userDetails']);
if ($userID == '') {
    echo (new Response(false, "Please check the User ID"))->getJSONResponse();
    return;
}

$getUserBillidResponse = (new Billid())->getUserBillids($userID);
echo json_encode($getUserBillidResponse);
return;
