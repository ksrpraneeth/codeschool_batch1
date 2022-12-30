<?php
include 'response.php';
include 'dbconnection.php';

session_start();

if (!array_key_exists('email',$_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a valid email address";
    echo json_encode($response);
    return;
}

if(strlen($_POST['email'])==0){
    $response['status']=false;
    $response['message']="Please enter EMAIL";
    echo json_encode($response);
    return;
}

if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password";
    echo json_encode($response);
    return;
}
if(strlen($_POST['email'])==0){
    $response['status']=false;
    $response['message']="Please enter EMAIL";
    echo json_encode($response);
    return;
}

$pdo = getDbConnection();
$statement = $pdo->prepare("select * from users where email =? and password= ?");
$statement->execute([$_POST['email'], md5($_POST['password'])]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

if (count($resultSet) == 0) {
    $response['status'] = false;
    $response['message'] = "Username or Password incorrect";
    echo json_encode($response);
    return;
}

$bytes = random_bytes(5);
$token=  bin2hex($bytes);


$statement = $pdo->prepare("UPDATE users set user_id =? where id = ?");
$statement->execute([$token,$resultSet[0]['id']]);

$response['status'] = true;
$response['message'] = "Login successful";
$response['data'] = $resultSet;
$_SESSION['email']=$_POST['email'];
echo json_encode($response);
return;