<?php 
include 'db.php'; 
include 'response.php';



try{
$statement = $pdo->prepare("select e.id , e.first_name ,e.last_name ,e.aadhar_number , e.phone_number , dep.department_name , de.designation
from employee_details e,designations de,departments dep where e.designation = de.id  and dep.id = e.department_id and where e.user_name=?");

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

// ------Query-------
// select e.id , e.first_name ,e.last_name ,e.aadhar_number , e.phone_number , dep.department_name , de.designation
//  from employee_details e,designations de,departments dep where dep.id = de.department_id  and dep.id = e.department_id ; 



