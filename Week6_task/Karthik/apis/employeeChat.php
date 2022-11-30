<?php
include "db.php";
include "response.php";

session_start();
if (!array_key_exists('toEmpId', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Employee ID";
    echo json_encode($response);
    return;
}
$toEmpId = $_POST['toEmpId'];
if (!array_key_exists('message', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Message";
    echo json_encode($response);
    return;
}
if ($toEmpId=="") {
    $response['status'] = false;
    $response['message'] = "Please select an Employee";
    echo json_encode($response);
    return;
}
$message = $_POST['message'];
if (strlen($message)==0) {
    $response['status'] = false;
    $response['message'] = "Please enter Message";
    echo json_encode($response);
    return;
}



$statement = $pdo->prepare("insert into messages(from_empid,message,to_empid) values(?,?,?)");
$statement->execute([($_SESSION['emp_id']),($_POST['message']),($toEmpId)]);
$response['status'] = true;
$response['message'] = "Message sent";
echo json_encode($response);