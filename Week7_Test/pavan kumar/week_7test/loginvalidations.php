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

if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password";
    echo json_encode($response);
    return;
}

try {
    $pdo = getDbConnection();
    $statement = $pdo->prepare("select * from users where username =? and password= ?");
    $statement->execute([$_POST['username'],($_POST['password'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "Username or Password Incorrect";
        echo json_encode($response);
        return;
    }

    $bytes = random_bytes(20);
    $token =  bin2hex($bytes);


    $statement = $pdo->prepare("UPDATE users set user_id =? where id = ?");
    $statement->execute([$token, $resultSet[0]['id']]);

    $response['status'] = true;
    $response['message'] = "Login Successfull";
    $response['data'] = $token;
    $_SESSION['username'] = $_POST['username'];
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}


