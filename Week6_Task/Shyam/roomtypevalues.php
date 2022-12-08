<?php
include 'database.php';
include 'response.php';

if (!array_key_exists('Room_Id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room Id";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Room_Type', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room Type";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Room_Number', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Room Number";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Floor_Id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Floor Id";
    echo json_encode($response);
    return;
}
if (!array_key_exists('token', $_POST)) {
    $response['status'] = false;
    $response['message'] = "User is not present";
    echo json_encode($response);
    return;
}

$Room_Id = $_POST["Room_Id"];
if(strlen($Room_Id) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Room Id";
    echo json_encode($response);
    return;
}

$Room_Type = $_POST["Room_Type"];
if(strlen($Room_Type) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Room Type";
    echo json_encode($response);
    return;
}

$Room_Number = $_POST["Room_Number"];
if(strlen($Room_Number) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Room Number";
    echo json_encode($response);
    return;
}

$Floor_Id = $_POST["Floor_Id"];
if(strlen($Floor_Id) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Floor Id";
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
    $stmt = $pdo->prepare("Insert into  roomtype(Room_Id,Room_Type,Room_Number,Floor_Id) values (?,?,?,?)");
    $resultSet = $stmt->execute([$_POST['Room_Id'], $_POST['Room_Type'], $_POST['Room_Number'], $_POST['Floor_Id']]);
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
