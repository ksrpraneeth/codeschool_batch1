<?php 
include 'db.php'; 
include 'response.php';


if (!array_key_exists('enterBankAcInput',$_POST)){
    $response['status'] =false;
    $response['message'] ="data is not provided.";
    echo json_encode($response);
    return;
}

if ($_POST['enterBankAcInput'] == '') {
    $response['status'] =false;
    $response['message'] ="*INVALID BANK AC NO*";
    $response['data']="";
    echo json_encode($response);
    return;
}
    


try{
$statement = $pdo->prepare("select employee_name ,id from employeedata where employee_bankacno=? ");
$statement->execute([$_POST['enterBankAcInput']]);
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