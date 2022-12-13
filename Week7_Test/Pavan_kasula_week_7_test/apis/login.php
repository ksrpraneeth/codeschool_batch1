<?php

include 'db.php';
include 'response.php';


if (!array_key_exists('username', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Username is not provided";
    echo json_encode($response);
    return;
};

if(!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "password is not provided";
    echo json_encode($response);
    return;
};
    $statement = $pdo->prepare("select id ,username , password  from users where username=? and password=?");
    $statement->execute([$_POST['username'],md5($_POST['password'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) == 0) {
        $response['status'] = false;
        $response['message'] = "Username or Password incorrect";
        echo json_encode($response);
        return;
    }

    $bytes = random_bytes(5);
    $token=  bin2hex($bytes);
    
    $statement = $pdo->prepare("UPDATE users set tokens =? where id = ?");
    $statement->execute([$token,$resultSet[0]['id']]);

    $response['status'] = true;
    $response['message'] = "success";
    $response['data']=$token;
    echo json_encode($response);
   
    return;
?>
