<?php

include 'dbconnection.php';
$response = [
    'status' => true,
    'message' => "",
    'data' => []
];

if (!array_key_exists('employeeid', $_POST)) {
    $response['status'] = false;
    $response['idError'] = "Please Enter a Employee id";
}
if (strlen($_POST['employeeid']) == 0) {
    $response['status'] = false;
    $response['idError'] = "Please Enter a Employee id";
}

if (!array_key_exists('name', $_POST)) {
    $response['status'] = false;
    $response['nameError'] = "Please Enter a Employee Name";
}
if (strlen($_POST['name']) == 0) {
    $response['status'] = false;
    $response['nameError'] = "Please Enter a Employee Name";
}

if (!array_key_exists('address', $_POST)){
    $response['status'] = false;
    $response['addressError'] = "Please Enter a Employee Address";
}
if (strlen($_POST['address']) == 0) {
    $response['status'] = false;
    $response['addressError'] = "Please Enter a Employee Address";
}

if(!$response['status']){
    echo json_encode($response);
    return; 
}

$pdo = getDbConnection();

$sql = "INSERT INTO employees_details(employeeid,name) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['employeeid'],$_POST['name']]);
$response['status'] = true;
$response['message'] = "Employee Added";
echo json_encode($response);

$sql = "INSERT INTO employees_address(employeeid,address) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['employeeid'],$_POST['address']]);
$response['status'] = true;
$response['message'] = "Employee Added";
echo json_encode($response);
return;

