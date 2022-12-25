<?php 
include 'db.php'; 
include 'response.php';


if (!array_key_exists('empCodeInput',$_POST)){
    $response['status'] =false;
    $response['message'] ="data is not provided.";
    echo json_encode($response);
    return;
}
if ($_POST['empCodeInput'] == '') {
    $response['status'] =false;
    $response['message'] ="*INVALID EMP NO*";
    $response['data']="";
    echo json_encode($response);
    return;
}
try{
$statement = $pdo->prepare("select employee_name , id from employeedata where id=? ");
$statement->execute([$_POST['empCodeInput']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "success";
$response['data']=$resultSet;
echo json_encode($response);
return;
}

catch(PDOException $e){
    $response['status'] =false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
    return;
}
