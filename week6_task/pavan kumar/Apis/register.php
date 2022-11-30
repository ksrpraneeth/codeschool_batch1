<?php
include 'response.php';
include 'dbconnection.php';

if (!array_key_exists('id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter patient id";
    echo json_encode($response);
    return;
}

if (!array_key_exists('name', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter patient name";
    echo json_encode($response);
    return;
}

if (!array_key_exists('age', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter age";
    echo json_encode($response);
    return;
}

if (!array_key_exists('gender', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Gender";
    echo json_encode($response);
    return;
}

if (!array_key_exists('address', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter patient Address";
    echo json_encode($response);
    return;
}

if (!array_key_exists('phonenumber', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter patient Phone no";
    echo json_encode($response);
    return;
}

if (!array_key_exists('bloodgroup', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter bloodgroup";
    echo json_encode($response);
    return;
}

if (!array_key_exists('dateofbirth', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Date of birth";
    echo json_encode($response);
    return;
}

$pdo = getDbConnection();
$statement = $pdo->prepare("select * from patients where phonenumber =?");
$statement->execute([$_POST['phonenumber']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($resultSet) == 1) {
    $response['status'] = false;
    $response['message'] = "already patient exists ";
    echo json_encode($response);
    return;
}
$sql = "INSERT INTO patients (id,name,age,gender,address,phonenumber,bloodgroup,dateofbirth) VALUES (?,?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['id'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['address'], $_POST['phonenumber'], $_POST['bloodgroup'], $_POST['dateofbirth']]);
$response['status'] = true;
$response['message'] = "data saved successfully";
$response['data'] = $resultSet;
echo json_encode($response);
return;
