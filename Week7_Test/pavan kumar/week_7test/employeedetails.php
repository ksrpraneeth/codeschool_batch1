<?php
include 'response.php';
include 'dbconnection.php';

if (!array_key_exists('firstname', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a firstname";
    echo json_encode($response);
    return;
}
if (!array_key_exists('lastname', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a lasttname";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Aadharnumber', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Aadhar number";
    echo json_encode($response);
    return;
}

if (strlen($_POST['Aadharnumber']) != 12) {
    $response['status'] = false;
    $response['message'] = "Aadharnumber should be 12 digits";
    echo json_encode($response);
    return;
}

if (!array_key_exists('mobilenumber', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a mobile number";
    echo json_encode($response);
    return;
}

if (strlen($_POST['mobilenumber']) != 10) {
    $response['status'] = false;
    $response['message'] = "mobile number should be 12 digits";
    echo json_encode($response);
    return;
}

if (!array_key_exists('department', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select a department";
    echo json_encode($response);
    return;
}

if (!array_key_exists('designation', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please select a designation";
    echo json_encode($response);
    return;
}

$pdo = getDbConnection();

$sql = "INSERT INTO employees(firstname,lastname,Aadharnumber,mobilenumber,department,designation) VALUES (?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['firstname'], $_POST['lastname'], $_POST['Aadharnumber'], $_POST['mobilenumber'],$_POST['department'],$_POST['designation']]);
$response['status'] = true;
$response['message'] = "Employee Added";
echo json_encode($response);
return;

