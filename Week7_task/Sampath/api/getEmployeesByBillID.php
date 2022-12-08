<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if(!checkSession()){
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if (!isset($_POST['billId'])) {
    echo (new Response(false, "Bill ID is missing"))->getJSONResponse();
    return;
}

$billId = $_POST['billId'];
if ($billId == '') {
    echo (new Response(false, "Please check the Bill ID"))->getJSONResponse();
    return;
}
$userId = (new Encryption())->decrypt($_SESSION["userDetails"]);
$getEmployeeResponse = (new Employee())->getEmployeesByBillID($billId, $userId);
echo json_encode($getEmployeeResponse);
return;
