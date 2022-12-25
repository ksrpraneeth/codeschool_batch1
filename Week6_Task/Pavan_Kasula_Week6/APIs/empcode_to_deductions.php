<?php
include 'db.php';
include 'response.php';

if (!array_key_exists('empCodeInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "data is not provided.";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("select e.entry_type,e.entry_name from entries e,emptoentry em 
where em.entry_id=e.id and e.entry_type='deduction' and em.emp_id=? ;");
$statement->execute([$_POST['empCodeInput']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "success";
$response['data'] = $resultSet;
echo json_encode($response);
return;


// select e.entry_type,e.entry_name,em.emp_id from entries e,emptoentry em 
// where em.entry_id=e.id and e.entry_type='deduction' and em.emp_id=? ;