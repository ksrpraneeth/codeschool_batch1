<?php
include 'response.php';
include 'dbconnection.php';

$pdo = getDbConnection();


$patients = $pdo->prepare("select id,name from patients");
$patients->execute([]);
$patientsSet = $patients->fetchAll(PDO::FETCH_ASSOC);


$doctors = $pdo->prepare('select id,name from doctors');
$doctors->execute([]);
$doctorsSet = $doctors->fetchAll(PDO::FETCH_ASSOC);

$rooms = $pdo->prepare('select id,room_name from rooms');
$rooms->execute([]);
$roomsSet = $rooms->fetchAll(PDO::FETCH_ASSOC);

$inwards = $pdo->prepare('select id,disease from diseases');
$inwards->execute([]);
$diseaseSet = $inwards->fetchAll(PDO::FETCH_ASSOC);

$resultSet= array("patients" =>$patientsSet,"doctors"=>$doctorsSet,"rooms"=>$roomsSet,"diseases"=>$diseaseSet);


$response['status'] = true;
$response['message'] = "select data";
$response['data'] = $resultSet;
echo json_encode($response);

