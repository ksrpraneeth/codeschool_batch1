<?php
include 'db.php';
$response = [
    'status' => false,
    'message' =>"",
    'data' =>[]
];

if(!isset ($_POST['Addtask'])){
    $response['status'] =false;
    $response['message'] ="Add task is not provided.";
    echo json_encode($response);
    return;
}
$statement = $pdo->prepare("select * from task where status=1  order by  id desc");
$statement = $pdo->prepare("Insert into Addtask (task,user_id) values (?,?)");
$queryResult = $statement->execute([$_POST['task'],$_POST['Username']]);

if($queryResult){
    $response['status'] = true;
    $response['message'] = "Task dataa saved successfully";
    echo json_encode($response);
    return;
}