<?php

include 'db.php';
include 'response.php';


if (!array_key_exists('firstName', $_POST)) {
    $response['status'] = false;
    $response['message'] = "FirstName is not provided";
    echo json_encode($response);
    return;
};
if(strlen($_POST['firstName'])==0){
    $response['status'] = false;
    $response['message'] = "*Please enter  first Name*";
    echo json_encode($response);
    return;
}

if(preg_match('/[^a-z_\-0-9]/i',$_POST['firstName'])){
    $response['status'] = false;
    $response['message'] = "*enter valid first Name*";
    echo json_encode($response);
    return;
}
if(!array_key_exists('lastName', $_POST)) {
    $response['status'] = false;
    $response['message'] = "LastName is not provided";
    echo json_encode($response);
    return;
};
if(strlen($_POST['lastName'])==0){
    $response['status'] = false;
    $response['message'] = "*Please enter  last Name*";
    echo json_encode($response);
    return;
}
if(preg_match('/[^a-z_\-0-9]/i',$_POST['lastName'])){
    $response['status'] = false;
    $response['message'] = "*enter valid last Name ";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Aadhaar', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Aadhaar Number is not provided";
    echo json_encode($response);
    return;
};
if(strlen($_POST['Aadhaar'])==0){
    $response['status'] = false;
    $response['message'] = "*Please enter  Aadhaar Number*";
    echo json_encode($response);
    return;
}

if(strlen($_POST['Aadhaar'])!=12){
    $response['status'] = false;
    $response['message'] = "*Aadhaar Number must be only 12 digits*";
    echo json_encode($response);
    return;
}
if(!array_key_exists('phoneNumber', $_POST)) {
    $response['status'] = false;
    $response['message'] = "phoneNumber is not provided";
    echo json_encode($response);
    return;
};


if(strlen($_POST['phoneNumber'])==0){
    $response['status'] = false;
    $response['message'] = "*Please enter Phone Number*";
    echo json_encode($response);
    return;
}
if(strlen($_POST['phoneNumber'])!=10){
    $response['status'] = false;
    $response['message'] = "*Phone Number must be 10 digit only*";
    echo json_encode($response);
    return;
}
if(!array_key_exists('designation', $_POST)) {
    $response['status'] = false;
    $response['message'] = "designation is not provided";
    echo json_encode($response);
    return;
};
if(!array_key_exists('department', $_POST)) {
    $response['status'] = false;
    $response['message'] = "department is not provided";
    echo json_encode($response);
    return;
};

try {
   
    $statement = $pdo->prepare("select * from employee_details where first_name=?");
    $statement->execute([$_POST['firstName']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) != 0) {
        $response['status'] = false;
        $response['message'] = "Employee already exists";
        echo json_encode($response);
        return;
    }
   
    $statement = $pdo->prepare("Insert into employee_details (user_name,first_name,last_name,aadhar_number,phone_number,department_id,designation) values (?,?,?,?,?,?,?)");
    $queryResult = $statement->execute( [$_SESSION['username'],$_POST['firstName'],$_POST['lastName'],$_POST['Aadhaar'],$_POST['phoneNumber'],$_POST['designation'],$_POST['department']] );
    if($queryResult){
        $response['status'] = true;
        $response['message'] = "Employee Added";
        echo json_encode($response);
        return;
    }
   
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}
