<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/sBill.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if (!checkSession()) {
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}

if (!isset($_POST['billId'])) {
    echo (new Response(false, "Bill ID is missing"))->getJSONResponse();
    exit;
}

$billId = $_POST['billId'];
$response = (new SBill())->getBillEmployees($billId);
echo json_encode($response);
exit;
