<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if (!checkSession()) {
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if (!isset($_POST["addingId"])) {
    echo (new Response(false, "Adding ID missing"))->getJSONResponse();
    exit;
}
if (!isset($_POST["addingAmount"])) {
    echo (new Response(false, "Adding Amount missing"))->getJSONResponse();
    exit;
}
if (!isset($_POST["empId"])) {
    echo (new Response(false, "Employee ID missing"))->getJSONResponse();
    exit;
}

$addingId = $_POST["addingId"];
$addingAmount = $_POST["addingAmount"];
$empId = $_POST["empId"];
$userID = (new Encryption())->decrypt($_SESSION['userDetails']);

$insertResponse = (new Employee())->insertEmployeeAdding($empId, $addingId, $addingAmount);
echo json_encode($insertResponse);

