<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/sBill.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if(!checkSession()){
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}

if(!isset($_POST['billId'])){
    echo (new Response(false, "Bill ID is missing"))->getJSONResponse();
    exit;
}

$billId = $_POST['billId'];
$response = (new SBill())->getSBillDetailsById($billId);
if($response["data"] == false){
    $response["status"] = false;
    echo json_encode($response);
    exit;
} else {
    $date = new DateTime($response["data"]["bill_date"]);
    $response["data"]["bill_date"] = $date->format('d/m/Y');
    $response["data"]["ddoCode"] = (new Encryption())->decrypt($_SESSION["userDetails"]);
    echo json_encode($response);
    exit;
}
