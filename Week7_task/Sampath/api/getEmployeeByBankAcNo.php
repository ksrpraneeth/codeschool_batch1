<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if(!checkSession()){
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if (!isset($_POST['bankAcNo'])) {
    echo (new Response(false, "Bank Account Number is missing"))->getJSONResponse();
    return;
}

$bankAcNo = $_POST['bankAcNo'];
if ($bankAcNo == '') {
    echo (new Response(false, "Please check the Bank Account Number"))->getJSONResponse();
    return;
}
$userId = (new Encryption())->decrypt($_SESSION["userDetails"]);
$getEmployeeResponse = (new Employee())->getEmployeeByBankAcNo($bankAcNo, $userId);
if ($getEmployeeResponse["data"] == false) {
    $getEmployeeResponse["data"] = [];
    $getEmployeeResponse["message"] = "No Employees Found";
}
echo json_encode($getEmployeeResponse);
return;
