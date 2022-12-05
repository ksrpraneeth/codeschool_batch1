<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if(!checkSession()){
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if (!isset($_POST['empCode'])) {
    echo (new Response(false, "Employee Code is missing"))->getJSONResponse();
    return;
}

$empCode = $_POST['empCode'];
if ($empCode == '') {
    echo (new Response(false, "Please check the Employee Code"))->getJSONResponse();
    return;
}
$userId = (new Encryption())->decrypt($_SESSION["userDetails"]);
$getEmployeeResponse = (new Employee())->getEmployeeByEmpCode($empCode, $userId);
if ($getEmployeeResponse["data"] == false) {
    $getEmployeeResponse["data"] = [];
    $getEmployeeResponse["message"] = "No Employees Found";
}
echo json_encode($getEmployeeResponse);
return;
