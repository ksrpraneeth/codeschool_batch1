<?php

include "db.php";
include "response.php";

session_start();
if (!array_key_exists('file', $_FILES)) {
    $response['status'] = false;
    $response['message'] = "File Missing";
    echo json_encode($response);
    return;
}
if (!array_key_exists('toEmpId', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Employee ID is Missing";
    echo json_encode($response);
    return;
}

$toEmpId = $_POST['toEmpId'];
$errors = array();
$file_name = $_FILES['file']['name'];
$file_ext = fileExtension($file_name);
$file_name = md5(date('Y-m-d H:i:s:u')) . '.' .$file_ext;
$file_tmp = $_FILES['file']['tmp_name'];
move_uploaded_file($file_tmp, "./../uploads/" . $file_name);
$statement = $pdo->prepare("insert into messages(from_empid,file_name,to_empid) values(?,?,?)");
$statement->execute([($_SESSION['emp_id']),($file_name),($toEmpId)]);
$response['status'] = true;
$response['message'] = "Success!";
echo json_encode($response);
return;
function fileExtension($name) {
    $n = strrpos($name, '.');
    return ($n === false) ? '' : substr($name, $n+1);
}