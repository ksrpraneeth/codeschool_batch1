<?php
include 'response.php';
include 'dbconnection.php';

session_start();

if (!array_key_exists('username', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a username";
    echo json_encode($response);
    return;
}
if (!preg_match_all("/[a-zA-Z0-9]{2,30}/i", ($_POST['username']))) {
    $response['status'] = false;
    $response['message'] = " username Should Not Be Contain Special Charaters";
    echo json_encode($response);
    return;
}
if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password";
    echo json_encode($response);
    return;
}

if (!array_key_exists('confirmpassword', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password";
    echo json_encode($response);
    return;
}
if (!array_key_exists('email', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a valid email address";
    echo json_encode($response);
    return;
}
if (!array_key_exists('phonenumber', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a mobilenumber";
    echo json_encode($response);
    return;
}

if (strlen($_POST['phonenumber']) != 10) {
    $response['status'] = false;
    $response['message'] = "mobile no should be 10 digits";
    echo json_encode($response);
    return;
}

if (($_POST['password']) != ($_POST['confirmpassword'])) {
    $response['status'] = false;
    $response['message'] = "password and confirm password should be same";
    echo json_encode($response);
    return;
}


$pdo = getDbConnection();
$statement = $pdo->prepare("select * from users where  username =?");
$statement->execute([$_POST['username']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($resultSet) == 1) {
    $response['status'] = false;
    $response['message'] = "User Already Registered";
    echo json_encode($response);
    return;
}
$sql = "INSERT INTO users(username,password,confirmpassword,email,phonenumber) VALUES (?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['username'], $_POST['password'], $_POST['confirmpassword'], $_POST['email'],$_POST['phonenumber']]);
$id = $pdo->lastInsertId();
$statement = $pdo->prepare("select * from users where id=? ");
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->execute([$id]);
$response['status'] = true;
$response['message'] = "User Registered";
$response['data'] = $resultSet;
echo json_encode($response);
return;
