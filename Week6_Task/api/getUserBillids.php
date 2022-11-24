<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";

if (!isset($_POST['userID'])) {
    echo (new Response(false, "User ID is missing"))->getJSONResponse();
    return;
}

$userID = $_POST['userID'];
if ($userID == '') {
    echo (new Response(false, "Please check the User ID"))->getJSONResponse();
    return;
}

$getUserBillidResponse = (new Billid())->getUserBillids($userID);
echo json_encode($getUserBillidResponse);
return;
