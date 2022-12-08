<?php

include 'response.php';
include 'db.php';

session_start();

if (!array_key_exists('username', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a valid UserName";
    echo json_encode($response);
    return;
}
if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("select * from users where username =? and password=?");
$statement->execute([$_POST['username'], md5($_POST['password'])]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($resultSet) == 0) {
    $response['status'] = false;
    $response['message'] = "Username or Password incorrect";
    echo json_encode($response);
    return;
}

$response['status'] = true;
$response['message'] = "Login successful .!!";
$response['data'] = $resultSet;
$_SESSION['user_id'] = $resultSet[0]['id'];
echo json_encode($response);

return;
