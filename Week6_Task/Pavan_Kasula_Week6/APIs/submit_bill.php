<?php 
include 'db.php'; 
include 'response.php';

if (!array_key_exists('billData', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Data is not found";
    echo json_encode($response);
    return;
}

try {
    $billDataForm = json_decode($_POST["billData"]);
    $sumOfTotalEarnings = $_POST["sumOfTotalEarnings"];
    $sumOfTotalDeductions = $_POST["sumOfTotalDeductions"];
    $sumOfTotalAmount = $_POST["sumOfTotalAmount"];
    for ($i = 0; $i< count($billDataForm);$i++){
            $userId = $billDataForm[$i]->userId;
            $netAmount = $billDataForm[$i]->netAmount;
            $date = $billDataForm[$i]->date;
            $earnings = $billDataForm[$i]->earnings;
            $deductions = $billDataForm[$i]->deductions;
            $emp_id = $billDataForm[$i]->emp_id;
            $sumOfEarnings = $billDataForm[$i]->sumOfEarnings;
            $sumOfDeductions = $billDataForm[$i]->sumOfDeductions;

    
    $statement = $pdo->prepare("select * from employee_bill where emp_id=? and year_month=?");
    $statement->execute([$emp_id, $date]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) != 0) {
        $response['status'] = false;
        $response['message'] = "Employee added already";
        $response['data'] = $resultSet;
        echo json_encode($response);
        return;
    }
     
    $statement = $pdo->prepare("insert into userbilltable(user_id,total_earnings,total_deductions,net_amount) values(?,?,?,?) returning id");
    $statement->execute([$userId, $sumOfTotalEarnings, $sumOfTotalDeductions, $sumOfTotalAmount]);
    $resultSet = $statement->fetch(PDO::FETCH_ASSOC);
    $user_bill_id = $resultSet["id"];
    
    $statement = $pdo->prepare("insert into employee_bill(user_bill_id,emp_id,total_earnings,total_deductions,net_amount,year_month) values(?,?,?,?,?,?)");
    $statement->execute([$user_bill_id,$emp_id, $sumOfEarnings, $sumOfDeductions, $netAmount, $date]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($earnings as $earning) {
            $statement = $pdo->prepare("insert into employee_bill_indetails(user_bill_id,emp_id,type_of_pay,amount) values(?,?,?,?)");
            $statement->execute([$user_bill_id,$emp_id, $earning->type, $earning->amount]);
        }
    
        foreach ($deductions as $deduction) {
            $statement = $pdo->prepare("insert into employee_bill_indetails(user_bill_id,emp_id,type_of_pay,amount) values(?,?,?,?)");
            $statement->execute([$user_bill_id,$emp_id, $deduction->type, $deduction->amount]);
        }
        $response['status'] = true;
        $response['message'] = "Employee added";
        $response['data'] = $resultSet;
        echo json_encode($response);
} 
}
catch(PDOException $e){
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
    return;
}


