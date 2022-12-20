<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if (!checkSession()) {
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if (!isset($_POST['empId'])) {
    echo (new Response(false, "Employee ID is missing"))->getJSONResponse();
    return;
}
$empId = $_POST['empId'];
$userId = (new Encryption())->decrypt($_SESSION["userDetails"]);
$getEmployeeResponse = (new Employee())->getEmployeeByEmpId($empId, $userId);
$getEmployeeDeductionResponse = (new Employee())->getEmployeeDeductions($empId);
$getEmployeeEarningsResponse = (new Employee())->getEmployeeEarnings($empId);
if ($getEmployeeResponse["status"] == true) {
    echo (new Response(true, "Success", [
        "empInfo" => $getEmployeeResponse["data"],
        "empDeductions" => $getEmployeeDeductionResponse["data"],
        "empEarnings" => $getEmployeeEarningsResponse["data"]
    ]))->getJSONResponse();
}
return;
