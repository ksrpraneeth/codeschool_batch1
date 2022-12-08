<?php
include 'database.php';
include 'response.php';

if (!array_key_exists('Patient_Id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Patient Id";
    echo json_encode($response);
    return;
}
if (!array_key_exists('First_Name', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter First Name";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Last_Name', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Last Name";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Age', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Age";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Disease', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Disease";
    echo json_encode($response);
    return;
}
if (!array_key_exists('department_name', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Department Name Id";
    echo json_encode($response);
    return;
}
if (!array_key_exists('room_type', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room Type Id";
    echo json_encode($response);
    return;
}
if (!array_key_exists('token', $_POST)) {
    $response['status'] = false;
    $response['message'] = "User is not present";
    echo json_encode($response);
    return;
}

$Patient_Id = $_POST["Patient_Id"];
if(strlen($Patient_Id) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Patient Id";
    echo json_encode($response);
    return;
}

$First_Name = $_POST["First_Name"];
if(strlen($First_Name) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter First Name";
    echo json_encode($response);
    return;
}

$Last_Name = $_POST["Last_Name"];
if(strlen($Last_Name) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Last Name";
    echo json_encode($response);
    return;
}

$Age = $_POST["Age"];
if(strlen($Age) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Age";
    echo json_encode($response);
    return;
}

$Disease = $_POST["Disease"];
if(strlen($Disease) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Disease";
    echo json_encode($response);
    return;
}


try{
    $pdo = connect();
    $statement = $pdo->prepare("select * from users where exp_time > now() and token = ? ");
    $statement->execute([$_POST['token']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet) == 0){
        $response['status'] = false;
        $response['message'] = "Logout";
        echo json_encode($response);
        return;
    }
    $stmt = $pdo->prepare("Insert into  patient(Patient_Id,First_Name,Last_Name,Age,Disease,department_name,room_type) values (?,?,?,?,?,?,?)");
    $resultSet = $stmt->execute([$_POST['Patient_Id'], $_POST['First_Name'], $_POST['Last_Name'], $_POST['Age'],$_POST['Disease'],$_POST['department_name'],$_POST['room_type']]);
    $response['status'] = true;
    $response['message'] = "data saved successfully";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
}
catch (PDOException $e) {
   die($e->getMessage());
} finally {
   if ($pdo) {
       $pdo = null;
   }
}