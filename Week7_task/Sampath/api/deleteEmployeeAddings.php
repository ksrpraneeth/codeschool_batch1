<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if (!isset($_POST["id"])) {
    echo (new Response(false, "ID missing"))->getJSONResponse();
    exit;
}

$id = $_POST["id"];

$response = (new Employee())->deleteEmployeeAdding($id);
echo json_encode($response);

