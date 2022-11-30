<?php
include "db.php";
include "response.php";
session_start();
if (!array_key_exists('newPasswordInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter new Password";
    echo json_encode($response);
    return;
}
try {
    $statement = $pdo->prepare("select * from employee where password=? and emp_id=?");
    $statement->execute([($_POST['newPasswordInput']),($_SESSION['emp_id'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet)!=0){
    $response['status'] = False;
    $response['message'] = "New Password Should Not Match Old Password";
    echo json_encode($response);
    return;
    }
    $statement = $pdo->prepare("update employee set password=? where emp_id=?");
    $statement->execute([($_POST['newPasswordInput']),($_SESSION['emp_id'])]);
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