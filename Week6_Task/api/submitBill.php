<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/sBill.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
session_start();
if (!isset($_POST['bills'])) {
    echo (new Response(false, "Bills Not Found"))->getJSONResponse();
    return false;
}

if (!isset($_POST['totalEarnings'])) {
    echo (new Response(false, "Total Earnings Not Found"))->getJSONResponse();
    return false;
}

if (!isset($_POST['totalDeductions'])) {
    echo (new Response(false, "Total Deductions Not Found"))->getJSONResponse();
    return false;
}

if (!isset($_SESSION["userDetails"])) {
    echo (new Response(false, "User ID Not Found"))->getJSONResponse();
    return false;
}

$totalDeductions = $_POST['totalDeductions'];
$totalEarnings = $_POST['totalEarnings'];
$bills = json_decode($_POST['bills'], true);
$userId = (new Encryption())->decrypt($_SESSION["userDetails"]);

$insertSBillResponse = (new SBill())->insertNewSBill($userId, $totalEarnings, $totalDeductions);

$sBillId = $insertSBillResponse["data"]["id"];
foreach ($bills as $bill) {
    $billId = (new Employee())->getEmployeeBillIdByEmployeeId($bill["empId"]);
    $sbillEmpMapInsertResponse = (new sBill())->insertSBillEmpMap($sBillId, $billId, $bill["empId"], $bill["earningsTotal"], $bill["deductionsTotal"], $bill["month"], $bill["year"]);
    $sBillEmpMapId = $sbillEmpMapInsertResponse["data"]["id"];
    foreach ($bill["earnings"] as $earning) {
        $billEarningInsertResponse = (new SBill())->insertSingleBillAddings($sBillId, $sBillEmpMapId, $earning["id"], $earning["amount"]);

        foreach ($bill["deductions"] as $deduction) {
            $billDeductionInsertResponse = (new SBill())->insertSingleBillAddings($sBillId, $sBillEmpMapId, $deduction["id"], $deduction["amount"]);
        }
    }
}

echo (new Response(true, "Success"))->getJSONResponse();
