<?php

include 'db.php';
include 'response.php';


if (!isset($_POST['username'])) {
    $response['status'] = false;
    $response['message'] = "username is not provided";
    echo json_encode($response);
    return;
};

if(!isset($_POST['password'])) {
    $response['status'] = false;
    $response['message'] = "password is not provided";
    echo json_encode($response);
    return;
};

if(!isset($_POST['email'])) {
    $response['status'] = false;
    $response['message'] = " email is not provided";
    echo json_encode($response);
    return;
};
if (!isset($_POST['phoneNumber'])) {
    $response['status'] = false;
    $response['message'] = "phoneNumber is not provided";
    echo json_encode($response);
    return;
};

//-----validations-----

if(strlen($_POST['username'])==0)
{
    $response['status'] = false;
    $response['message'] = "*Please enter  username*";
    echo json_encode($response);
    return;
}
if(preg_match('/[^a-z_\-0-9]/i',$_POST['username'])){

    $response['status'] = false;
    $response['message'] = "*Please Valid  username*";
    echo json_encode($response);
    return;
}

if(strlen($_POST['password'])==0){
    $response['status'] = false;
    $response['message'] = "*Please enter  password*";
    echo json_encode($response);
    return;
}

if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+.{7,}$/",$_POST['password'])) {
    $response['status'] = false;
    $response['message'] = "*Please enter Valid password*";
    echo json_encode($response);
    return;
}

if(strlen($_POST['email'])==0)
{
    $response['status'] = false;
    $response['message'] = "Please enter  email";
    echo json_encode($response);
    return;
}

if(!preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/",$_POST['email']))
{
    $response['status'] = false;
    $response['message'] = "Please enter Valid email";
    echo json_encode($response);
    return;
}

if(strlen($_POST['phoneNumber'])==0)
{
    $response['status'] = false;
    $response['message'] = "Please enter phoneNumber";
    echo json_encode($response);
    return;
}



if (!preg_match("/[0-9]{10}/",$_POST['phoneNumber'])) {
    $response['status'] = false;
    $response['message'] = "*Phone No Should be 10 digits only*";
    echo json_encode($response);
    return;
}
try {
   
    $statement = $pdo->prepare("select * from users where username=?");
    $statement->execute([$_POST['username']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) != 0) {
        $response['status'] = false;
        $response['message'] = "username already exists";
        echo json_encode($response);
        return;
    }
   
    
    $statement = $pdo->prepare("Insert into users (username,password,email,phonenumber) values (?,?,?,?)");
    $queryResult = $statement->execute([$_POST['username'],md5($_POST['password']),$_POST['email'],$_POST['phoneNumber'] ]);
    if($queryResult){
        $response['status'] = true;
        $response['message'] = $_POST['username']." successfully registered";
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

