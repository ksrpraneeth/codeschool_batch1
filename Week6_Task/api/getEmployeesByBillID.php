<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";

if (!isset($_POST['billID'])) {
    echo (new Response(false, "Bill ID is missing"))->getJSONResponse();
    return;
}

$billID = $_POST['billID'];
if ($billID == '') {
    echo (new Response(false, "Please check the Bill ID"))->getJSONResponse();
    return;
}

$getEmployeeResponse = (new Employee())->getEmployeesByBillID($billID);
echo json_encode($getEmployeeResponse);
return;
