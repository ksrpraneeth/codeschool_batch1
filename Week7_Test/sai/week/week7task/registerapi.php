<?php
include 'database.php';
include 'response.php';

if (!array_key_exists('username', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a valid username address";
    echo json_encode($response);
    return;
}
$username = $_POST['username'];

if (!array_key_exists('password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password address";
    echo json_encode($response);
    return;
}
$password = $_POST['password'];

if (!array_key_exists('confirmpassword', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Confirm Password address";
    echo json_encode($response);
    return;
}
$confirmpassword = $_POST['confirmpassword'];

if (!array_key_exists('email', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a email address";
    echo json_encode($response);
    return;
}
$email = $_POST['email'];


if (!array_key_exists('mobile', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a mobile address";
    echo json_encode($response);
    return;
}
$mobile = $_POST['mobile'];

if (strlen($employeeid) == "0") {
    $response['status'] = false;
    $response['message'] = "Please enter a employeeid";
    echo json_encode($response);
    return;
}

if (strlen($username) == "0") {
    $response['status'] = false;
    $response['message'] = "Please enter a username";
    echo json_encode($response);
    return;
}
if (strlen($password) == "0") {
    $response['status'] = false;
    $response['message'] = "Please enter a password";
    echo json_encode($response);
    return;
}
if (strlen($confirmpassword) == "0") {
    $response['status'] = false;
    $response['message'] = "Please enter a confirmpassword";
    echo json_encode($response);
    return;
}
if (strlen($email) == "0") {
    $response['status'] = false;
    $response['message'] = "Please enter a email";
    echo json_encode($response);
    return;
}
if (strlen($mobile) == "0") {
    $response['status'] = false;
    $response['message'] = "Please enter a mobile number";
    echo json_encode($response);
    return;
}


try {
    // $statement = $pdo->prepare("select * from users where username = ?");
    // $statement->execute([$_POST["username"]]);
    // $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    // if (count($resultSet) != 0) {
    //     $response['status'] = false;
    //     $response['message'] = "username already exists";
    //     echo json_encode($response);
    //     return;
    // }   
    $statement = $pdo->prepare("Insert into users(username,password,confirmpassword,email,mobile)values(?,?,?,?,?)");
    $queryResult = $statement->execute([$_POST['username'], ($_POST['password']), ($_POST['confirmpassword']), ($_POST['email']), ($_POST['mobile'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $response['status'] = true;
    $response['message'] = "sucessfull";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}