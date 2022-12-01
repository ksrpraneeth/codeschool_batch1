<?php
include 'response.php';
include 'dbconnection.php';

if (!array_key_exists('patient_id',$_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select patient";
    echo json_encode($response);
    return;
}

if (!array_key_exists('doctor_id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select doctor";
    echo json_encode($response);
    return;
}

if (!array_key_exists('room_id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select  room";
    echo json_encode($response);
    return;
}

if (!array_key_exists('disease_id', $_POST)){
    $response['status'] = false;
    $response['message'] = "Please select disease";
    echo json_encode($response);
    return;
}

$pdo = getDbConnection();
$statement = $pdo->prepare("select * from inwards where patient_id=? and disease_id");
$statement->execute([$_POST['patient_id'],$_POST['disease_id']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($resultSet) == 2) {
    $response['status'] = false;
    $response['message'] = "only one inward allowed under one disease";
    echo json_encode($response);
    return;
}

$sql = "INSERT INTO inwards(patient_id,doctor_id,room_id,disease_id) VALUES (?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['patient_id'], $_POST['doctor_id'], $_POST['room_id'], $_POST['disease_id']]);
$id = $pdo->lastInsertId();
$statement = $pdo->prepare("select * from inwards where id=? ");
$statement->execute([$id]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "data saved successfully";
$response['data'] = $resultSet;
echo json_encode($response);
return;

