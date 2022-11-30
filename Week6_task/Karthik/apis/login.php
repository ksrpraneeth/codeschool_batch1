<?php
include 'response.php';
include 'db.php';
session_start();
if (!array_key_exists('empIdInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Employee ID";
    echo json_encode($response);
    return;
}
if (!array_key_exists('passwordInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password address";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("select * from employee where emp_id =? and password= ?");
$statement->execute([$_POST['empIdInput'], ($_POST['passwordInput'])]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

if (count($resultSet) == 0) {
    $response['status'] = false;
    $response['message'] = "EmployeeId or Password incorrect";
    echo json_encode($response);
    return;
}
if($resultSet[0]["role_id"]=='12'){
    $response['status'] = true;
    $response['message'] = "Login successful";
    $response['type'] = 'Admin';
}
else{
    $response['status'] = true;
    $response['message'] = "Login successful";
    $response['type'] = 'Employee';
}

$response['data'] = $resultSet;
$_SESSION['emp_id']=$resultSet[0]["emp_id"];
$_SESSION['role_id']=$resultSet[0]["role_id"];

echo json_encode($response);
return;