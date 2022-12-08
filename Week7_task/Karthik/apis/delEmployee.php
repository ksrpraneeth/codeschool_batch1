<?php

include "db.php";
include "response.php"; 

if (!array_key_exists('empIds', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Employee ID";
    echo json_encode($response);
    return;
}

$empIds = json_decode($_POST["empIds"]);
if(count($empIds)==0){
    $response['status'] = false;
    $response['message'] = "Please Select at least one Employee ID";
    echo json_encode($response);
    return;
}
try{
    foreach($empIds as $empId){
        $statement = $pdo->prepare("delete from employee where emp_id=?");
        $statement->execute([$empId]);
    }
} catch(\PDOException $e){
    $response['status'] = false;
    $response['message'] = "DB Error: ".$e->getMessage();
    echo json_encode($response);
    return;
}

$response['status'] = true;
$response['message'] = "Employees deleted";
echo json_encode($response);
return;
?>