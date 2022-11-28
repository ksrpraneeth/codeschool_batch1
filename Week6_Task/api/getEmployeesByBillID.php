<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";

if (!isset($_POST['billId'])) {
    echo (new Response(false, "Bill ID is missing"))->getJSONResponse();
    return;
}

$billId = $_POST['billId'];
if ($billId == '') {
    echo (new Response(false, "Please check the Bill ID"))->getJSONResponse();
    return;
}

$getEmployeeResponse = (new Employee())->getEmployeesByBillID($billId);
echo json_encode($getEmployeeResponse);
return;
