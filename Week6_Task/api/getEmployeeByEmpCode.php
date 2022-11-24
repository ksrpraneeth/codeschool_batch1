<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";

if (!isset($_POST['empCode'])) {
    echo (new Response(false, "Employee Code is missing"))->getJSONResponse();
    return;
}

$empCode = $_POST['empCode'];
if ($empCode == '') {
    echo (new Response(false, "Please check the Employee Code"))->getJSONResponse();
    return;
}

$getEmployeeResponse = (new Employee())->getEmployeeByEmpCode($empCode);
if ($getEmployeeResponse["data"] == false) {
    $getEmployeeResponse["data"] = null;
    $getEmployeeResponse["message"] = "No Employees Found";
}
echo json_encode($getEmployeeResponse);
return;
