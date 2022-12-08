<?php
include "db.php";
include "response.php";
session_start();
if (!array_key_exists('oldPasswordInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter old Password";
    echo json_encode($response);
    return;
}
$oldPasswordInput = $_POST['oldPasswordInput'];
if (!array_key_exists('newPasswordInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter new Password";
    echo json_encode($response);
    return;
}
$newPasswordInput = $_POST['newPasswordInput'];
if (!array_key_exists('confirmNewPasswordInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Confirm Password";
    echo json_encode($response);
    return;
}
$confirmNewPasswordInput = $_POST['confirmNewPasswordInput'];

if(strlen($oldPasswordInput) ==0){
    $response['status'] = false;
    $response['message'] = "Please Enter Old Password";
    echo json_encode($response);
    return;
}
if(strlen($newPasswordInput) ==0){
    $response['status'] = false;
    $response['message'] = "Please Enter New Password";
    echo json_encode($response);
    return;
}if(strlen($confirmNewPasswordInput) ==0){
    $response['status'] = false;
    $response['message'] = "Please Enter Confirm Password";
    echo json_encode($response);
    return;
}
if ($oldPasswordInput == $newPasswordInput){
    $response['status'] = false;
    $response['message'] = "New Password Should  be Different From Old Password";
    echo json_encode($response);
    return;
}
if($newPasswordInput != $confirmNewPasswordInput){
    $response['status'] = false;
    $response['message'] = "New Password and Confirm New Password should be  same";
    echo json_encode($response);
    return;
}
try {
    $statement = $pdo->prepare("select * from employee where password=? and emp_id=?");
    $statement->execute([($oldPasswordInput),($_SESSION['emp_id'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet)==0){
    $response['status'] = false;
    $response['message'] = "Old Password is Incorrect";
    echo json_encode($response);
    return;
    }

    $statement = $pdo->prepare("update employee set password=? where emp_id=?");
    $statement->execute([md5($newPasswordInput),($_SESSION['emp_id'])]);
    $response['status'] = true;
    $response['message'] = "Password changed";
    echo json_encode($response);
    return;
}
catch (PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}