<?php
include 'response.php';
include 'dbconnection.php';

$pdo = getDbConnection();


$department = $pdo->prepare("select id,name from department");
$department->execute([]);
$departmentSet = $department->fetchAll(PDO::FETCH_ASSOC);


$designation = $pdo->prepare('select id,name from designation');
$designation->execute([]);
$designationSet = $designation->fetchAll(PDO::FETCH_ASSOC);


$resultSet= array("department" =>$departmentSet,"designation"=>$designationSet);


$response['status'] = true;
$response['message'] = "Select Data";
$response['data'] = $resultSet;
echo json_encode($response);

