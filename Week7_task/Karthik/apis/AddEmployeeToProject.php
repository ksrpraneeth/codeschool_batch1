<?php
include "db.php";
include "response.php";
session_start();

if (!array_key_exists('AddEmployeeToProjectInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Select Employee";
    echo json_encode($response);
    return;
}
$AddEmployeeToProjectInput = $_POST['AddEmployeeToProjectInput'];
if (!array_key_exists('projectId', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Project ID";
    echo json_encode($response);
    return;
}
$projectId = $_POST['projectId'];
if(strlen($AddEmployeeToProjectInput)==0){
    $response['status'] = false;
    $response['message'] = "Please Select Employee";
    echo json_encode($response);
    return;
}

try {
    $statement = $pdo->prepare("select * from project_mapping where project_id=? and emp_id=?");
    $statement->execute([($projectId),($AddEmployeeToProjectInput)]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet)!=0){
    $response['status'] = false;
    $response['message'] = "Employee already Present in Project";
    echo json_encode($response);
    return;
    }

    $statement = $pdo->prepare("insert into project_mapping(project_id,emp_id) values (?,?)");
    $statement->execute([($projectId),($AddEmployeeToProjectInput)]);
    $response['status'] = true;
    $response['message'] = "Employee Added";
    echo json_encode($response);
    return;
}
catch (PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}