<?php
include 'response.php';
include 'dbconnection.php';

$pdo = getDbConnection();
$statement = $pdo->prepare("select a.id,a.doctor_id,a.room_id,a.patient_id,a.disease_id,p.name as patient_name,r.room_name,d.disease as disease_name,dr.name as doctor_name from inwards as a, rooms as r,  diseases as d,  doctors as dr, patients as p  where a.patient_id=p.id and a.room_id =r.id and a.doctor_id=dr.id and  a.disease_id=d.id");
$statement->execute();
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "data fetched successfully";
$response['data'] = $resultSet;
echo json_encode($response);
return;
