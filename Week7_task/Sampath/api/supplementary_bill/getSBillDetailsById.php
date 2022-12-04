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
$billInfoResponse = (new SBill())->getSBillDetailsById($billId);
if ($billInfoResponse["data"] == false) {
    $billInfoResponse["status"] = false;
    echo json_encode($billInfoResponse);
    exit;
} else {
    $date = new DateTime($billInfoResponse["data"]["bill_date"]);
    $billInfoResponse["data"]["bill_date"] = $date->format('d/m/Y');
    $billInfoResponse["data"]["ddoCode"] = (new Encryption())->decrypt($_SESSION["userDetails"]);
    $employeeResponse = (new SBill())->getBillEmployees($billId);
    $billAddingsResponse = (new SBill())->getBillAddings($billId);
    echo (new Response(true, "Success", [
        "billInfo" => $billInfoResponse,
        "employeesInfo" => $employeeResponse,
        "addingsInfo" => $billAddingsResponse
    ]))->getJSONResponse();
    exit;
}
