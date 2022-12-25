<?php
include 'db.php';
include 'response.php';

if (!array_key_exists('enterBankAcInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "data is not provided.";
    echo json_encode($response);
    return;
}
try{ 
$statement = $pdo->prepare("select e.entry_type,e.entry_name from entries e,emptoentry em ,employeedata emp
where em.entry_id=e.id and emp.id = em.emp_id and e.entry_type='deduction' and emp.employee_bankacno=?;");
$statement->execute([$_POST['enterBankAcInput']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "success";
$response['data'] = $resultSet;
echo json_encode($response);
return;
}

catch(PDOException $e){
    $response['status'] = false;    
$response['message'] = $e->getMessage();
    echo json_encode($response);
    return;
}



