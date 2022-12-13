<?php
include 'response.php';
include 'db.php';

if (!isset($_POST['userId'])) {
    $response['status'] = false;
    $response['message'] = "User ID is not provided.";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("select * from todo_tasks where user_id= ? order by created_at desc");
$statement->execute([$_POST['userId']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "success";
$response['data']=$resultSet;
echo json_encode($response);
return;
