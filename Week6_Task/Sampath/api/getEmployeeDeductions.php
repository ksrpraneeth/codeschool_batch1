<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if(!checkSession()){
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if(!isset($_POST["empId"])){
    echo (new Response(false, "Employee ID is missing"))->getJSONResponse();
    return false;
}

$empId = $_POST['empId'];
$getEmployeeDeductionResponse = (new Employee())->getEmployeeDeductions($empId);
echo json_encode($getEmployeeDeductionResponse);
