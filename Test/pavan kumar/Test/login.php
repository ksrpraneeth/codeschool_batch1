<?php

include 'dbconnection.php';

$response = [
    'status' => true,
    'message' => "",
    'data' => []
];

if (!array_key_exists('username', $_POST)) {
    $response['status'] = false;
    $response['userNameError'] = "Please enter a username";
}
if (strlen($_POST['username'])==0) {
    $response['status'] = false;
    $response['userNameError'] = "Please enter a username";
}
if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['passworderror'] = "Please enter a Password";
}
if (strlen($_POST['password'])==0) {
    $response['status'] = false;
    $response['passworderror'] = "Please enter a Password";
}
if(!$response['status']){
    echo json_encode($response);
    return; 
}
try {
    $pdo = getDbConnection();
    $statement = $pdo->prepare("select * from users where username =? and password= ?");
    $statement->execute([$_POST['username'],md5(($_POST['password']))]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "Username or Password Incorrect";
        echo json_encode($response);
        return;
    }

    $bytes = random_bytes(5);
    $token =  bin2hex($bytes);


    $statement = $pdo->prepare("UPDATE users set token =? where id = ?");
    $statement->execute([$token, $resultSet[0]['id']]);

    $response['status'] = true;
    $response['message'] = "Login Successfull";
    $response['data'] = $token;
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}


