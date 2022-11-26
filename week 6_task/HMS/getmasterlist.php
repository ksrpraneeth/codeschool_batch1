<?php
include 'response.php';
include 'dbconnection.php';

$pdo = getDbConnection();

$patients = $pdo->prepare('select id,name from patients');
$statement->execute([]);
$patientsSet = $statement->fetchAll(PDO::FETCH_ASSOC);


$doctors = $pdo->prepare('select id,name from doctors');
$statement->execute([]);
$doctorsSet = $statement->fetchAll(PDO::FETCH_ASSOC);

$rooms = $pdo->prepare('select id,room_name from rooms');
$statement->execute([]);
$roomsSet = $statement->fetchAll(PDO::FETCH_ASSOC);

$inwards = $pdo->prepare('select id,disease from diseases');
$statement->execute([]);
$diseaseSet = $statement->fetchAll(PDO::FETCH_ASSOC);

$resultSet= array("patientSet=>[]","doctorsSet=>[]","roomsSet=>[]","diseaseSet=>[]");
if (count($resultSet) == 0) {
    $response['status'] = false;
    $response['message'] = "No data found ";
    echo json_encode($response);
    return;
}

$response['status'] = true;
$response['message'] = "select data";
$response['data'] = $resultSet;
echo json_encode($response);

