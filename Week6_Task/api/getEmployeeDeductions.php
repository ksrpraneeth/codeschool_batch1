<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";

if(!isset($_POST["empId"])){
    echo (new Response(false, "Employee ID is missing"))->getJSONResponse();
    return false;
}

$empId = $_POST['empId'];
$getEmployeeDeductionResponse = (new Employee())->getEmployeeDeductions($empId);
echo json_encode($getEmployeeDeductionResponse);
