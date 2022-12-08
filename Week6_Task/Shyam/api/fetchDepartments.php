<?php
include './../database.php';

try{
    $pdo = connect();
    $statement = $pdo -> prepare("select departmentid,departmentname from department");
    $statement -> execute();
    $departments = $statement->fetchAll(PDO::FETCH_ASSOC);
    $response['status'] = true;
    $response['message'] = "Data Printed Successfully";
    $response['data'] =  $departments;
    echo json_encode($response);
    
} catch(PDOException $e){
    $response['status'] = false;
    $response['message'] = "error";
    $response['data'] =  $departments;
    echo json_encode($response);
}

