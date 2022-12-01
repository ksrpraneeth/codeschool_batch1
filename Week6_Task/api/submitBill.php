<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/sBill.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/employee.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if (!checkSession()) {
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
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


try {
    $pdo = (new DBConnection())->getPdo();

    $pdo->beginTransaction();
    // $insertSBillResponse = (new SBill())->insertNewSBill($userId, $totalEarnings, $totalDeductions);
    $newSBillQuery = "  INSERT 
                INTO supplementary_bills (user_id, total_earnings, total_deductions) 
                VALUES (?, ?, ?)
                RETURNING id";
    $statement = $pdo->prepare($newSBillQuery);
    $statement->execute([$userId, $totalEarnings, $totalDeductions]);
    $sBillId = ($statement->fetch(PDO::FETCH_ASSOC))["id"];

    $newEmpBillQuery = "INSERT INTO s_bill_emp_map 
    (s_bill_id, bill_id, emp_id, total_earnings, total_deductions, month, year)
    VALUES 
    (?, ?, ?, ?, ?, ?, ?) RETURNING id; ";

    foreach ($bills as $bill) {
        $billId = (new Employee())->getEmployeeBillIdByEmployeeId($bill["empId"]);
        $newEmpBillStatement = $pdo->prepare($newEmpBillQuery);
        $newEmpBillStatement->execute([$sBillId, $billId, $bill["empId"], $bill["earningsTotal"], $bill["deductionsTotal"], $bill["month"], $bill["year"]]);
        $empBillId = ($newEmpBillStatement->fetch(PDO::FETCH_ASSOC))['id'];

        $newEarningQuery = "INSERT INTO bill_addings (s_bill_id, s_bill_emp_map_id, adding_type_id, amount)
        VALUES (?, ?, ?, ?)";
        foreach ($bill["earnings"] as $earning) {
            $newEarningStatement = $pdo->prepare($newEarningQuery);
            $newEarningStatement->execute([$sBillId, $empBillId, $earning["id"], $earning["amount"]]);
        }
        foreach ($bill["deductions"] as $deduction) {
            $newEarningStatement = $pdo->prepare($newEarningQuery);
            $newEarningStatement->execute([$sBillId, $empBillId, $deduction["id"], $deduction["amount"]]);
        }
    }

    $pdo->commit();
    echo (new Response(true, "Success"))->getJSONResponse();
} catch (\PDOException $e) {
    $pdo->rollback();
    echo (new Response(false, "Transaction Failed Error" . $e->getMessage()))->getJSONResponse();
}











// echo (new Response(true, "Success"))->getJSONResponse();
// $insertSBillResponse = (new SBill())->insertNewSBill($userId, $totalEarnings, $totalDeductions);

// $sBillId = $insertSBillResponse["data"]["id"];
// foreach ($bills as $bill) {
//     $billId = (new Employee())->getEmployeeBillIdByEmployeeId($bill["empId"]);
//     $sbillEmpMapInsertResponse = (new sBill())->insertSBillEmpMap($sBillId, $billId, $bill["empId"], $bill["earningsTotal"], $bill["deductionsTotal"], $bill["month"], $bill["year"]);
//     $sBillEmpMapId = $sbillEmpMapInsertResponse["data"]["id"];
//     foreach ($bill["earnings"] as $earning) {
//         $billEarningInsertResponse = (new SBill())->insertSingleBillAddings($sBillId, $sBillEmpMapId, $earning["id"], $earning["amount"]);

//         foreach ($bill["deductions"] as $deduction) {
//             $billDeductionInsertResponse = (new SBill())->insertSingleBillAddings($sBillId, $sBillEmpMapId, $deduction["id"], $deduction["amount"]);
//         }
//     }
// }