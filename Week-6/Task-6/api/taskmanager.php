<?php
include 'db.php';
$response = [
    'status' => false,
    'message' =>"",
    'data' =>[]
];
$statement = $pdo->prepare("select * from Addtask where Username=?");
$statement->execute([$_POST['Username']]);
$resultSet = $statement->fetch(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "success";
$response['data']=$resultSet;
echo json_encode($response);
return;
