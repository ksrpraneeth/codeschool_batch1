<?php
include 'response.php';
include 'database.php';

$pdo = connect();
$statement = $pdo->prepare("select * from department ");
$statement->execute();
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "Data Printed Successfully";
$response['data'] = $resultSet;
echo json_encode($response);
return;
