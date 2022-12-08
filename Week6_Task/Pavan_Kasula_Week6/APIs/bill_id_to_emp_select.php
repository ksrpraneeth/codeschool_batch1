<?php
include 'db.php';
include 'response.php';


if (!array_key_exists('billIdSelect', $_POST)) {
    $response['status'] = false;
    $response['message'] = "data is not provided.";
    echo json_encode($response);
    return;
}



$statement = $pdo->prepare("select employee_name ,id from employeedata where bill_id=? ");
$statement->execute([$_POST['billIdSelect']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "success";
$response['data'] = $resultSet;
echo json_encode($response);
return;