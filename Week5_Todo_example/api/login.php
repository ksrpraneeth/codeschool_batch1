<?php
include 'response.php';
include 'db.php';

if (!array_key_exists('email', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a valid email address";
    echo json_encode($response);
    return;
}
if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password";
    echo json_encode($response);
    return;
}

$statement = $pdo->prepare("select * from users where email =? and password= ?");
$statement->execute([$_POST['email'], md5($_POST['password'])]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($resultSet) == 0) {
    $response['status'] = false;
    $response['message'] = "Username or Password incorrect";
    echo json_encode($response);
    return;
}

$response['status'] = true;
$response['message'] = "Login successful";
$response['data'] = $resultSet;
echo json_encode($response);
return;