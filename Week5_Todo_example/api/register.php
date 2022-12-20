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
    $response['message'] = "Please enter a Password address";
    echo json_encode($response);
    return;
}
if (!array_key_exists('confirmPassword', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Confirm Password address";
    echo json_encode($response);
    return;
}

try {
   
    $statement = $pdo->prepare("select * from users where email =?");
    $statement->execute([$_POST['email']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) != 0) {
        $response['status'] = false;
        $response['message'] = "Email already exists";
        echo json_encode($response);
        return;
    }
  
    $statement = $pdo->prepare("Insert into users (email,password) values (?,?)");
    $queryResult = $statement->execute([$_POST['email'],md5($_POST['password'])]);
    
    if($queryResult){
        $response['status'] = true;
        $response['message'] = $_POST['email']." successfully registered";
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