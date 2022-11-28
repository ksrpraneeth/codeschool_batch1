<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";

if (!isset($_POST['bankAcNo'])) {
    echo (new Response(false, "Bank Account Number is missing"))->getJSONResponse();
    return;
}

$bankAcNo = $_POST['bankAcNo'];
if ($bankAcNo == '') {
    echo (new Response(false, "Please check the Bank Account Number"))->getJSONResponse();
    return;
}

$getEmployeeResponse = (new Employee())->getEmployeeByBankAcNo($bankAcNo);
if ($getEmployeeResponse["data"] == false) {
    $getEmployeeResponse["data"] = [];
    $getEmployeeResponse["message"] = "No Employees Found";
}
echo json_encode($getEmployeeResponse);
return;
