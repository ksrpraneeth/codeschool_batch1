<?php
include 'response.php';
include 'db.php';

if(!isset ($_POST['task'])){
    $response['status'] =false;
    $response['message'] ="Todo task data is not provided.";
    echo json_encode($response);
    return;
}
if(!isset($_POST['userId'])){
    $response['status'] =false;
    $response['message'] ="User ID is not provided.";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("Insert into todo_tasks (task,user_id) values (?,?)");
$queryResult = $statement->execute([$_POST['task'],$_POST['userId']]);

if($queryResult){
    $response['status'] = true;
    $response['message'] = "Task saved successfully";
    echo json_encode($response);
    return;
}
