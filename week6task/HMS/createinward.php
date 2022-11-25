<?php
include 'response.php';
include 'dbconnection.php';

if (!array_key_exists('id',$_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select patient";
    echo json_encode($response);
    return;
}

if (!array_key_exists('doctors', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select doctor";
    echo json_encode($response);
    return;
}

if (!array_key_exists('rooms', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select  room";
    echo json_encode($response);
    return;
}

if (!array_key_exists('disease', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select disease";
    echo json_encode($response);
    return;
}

$pdo = getDbConnection();
$statement = $pdo->prepare("select * from inwards where id =? AND doctors= ? AND room=? AND disease=?");
$statement->execute([$_POST['id'],($_POST['doctors']),($_POST['room']),($_POST['disease'])]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
return;