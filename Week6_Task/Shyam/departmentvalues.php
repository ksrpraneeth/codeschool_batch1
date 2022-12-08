<?php
include_once 'database.php';
include 'response.php';
// include_once 'login.php';

if (!array_key_exists('DepartmentId', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Department Id";
    echo json_encode($response);
    return;
}

if (!array_key_exists('DepartmentName', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Department Name";
    echo json_encode($response);
    return;
}

if (!array_key_exists('DepartmentHead', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Department Head";
    echo json_encode($response);
    return;
}
if (!array_key_exists('DepartmentPhoneNumber', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter Department Phone Number";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Floor_Id', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Enter  Floor Number";
    echo json_encode($response);
    return;
}
if (!array_key_exists('token', $_POST)) {
    $response['status'] = false;
    $response['message'] = "User is not present";
    echo json_encode($response);
    return;
}

$DepartmentId = $_POST["DepartmentId"];
if(strlen($DepartmentId) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Department Id";
    echo json_encode($response);
    return;
}
$DepartmentName = $_POST["DepartmentName"];
if(strlen($DepartmentName) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Department Name";
    echo json_encode($response);
    return;
}
$DepartmentName = $_POST["DepartmentName"];
if (!preg_match("/[A-Za-z]/",$DepartmentName)) {
    $response['status'] = false;
    $response['message'] = "Department Name should not contain digits";
    echo json_encode($response);
    return;
}

$DepartmentHead = $_POST["DepartmentHead"];
if(strlen($DepartmentHead) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Department Head";
    echo json_encode($response);
    return;
}
$DepartmentPhoneNumber = $_POST["DepartmentPhoneNumber"];
if(strlen($DepartmentPhoneNumber) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Department PhoneNumber";
    echo json_encode($response);
    return;
}
if (!preg_match("/[0-9]/",$DepartmentPhoneNumber)) {
    $response['status'] = false;
    $response['message'] = "Department Phone Number Should Contains only Digits";
    echo json_encode($response);
    return;
}

$Floor_Id = $_POST["Floor_Id"];
if(strlen($Floor_Id) == "0"){
    $response['status'] = false;
    $response['message'] = "Please Enter Floor Id";
    echo json_encode($response);
    return;
}

$departmentName = ucwords(strtolower($_POST['DepartmentName']));
try{
    $pdo = connect();
        
    $statement = $pdo->prepare("select * from users where exp_time > now() and token = ? ");
    $statement->execute([$_POST['token']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet) == 0){
        $response['status'] = false;
        $response['message'] = "Logout";
        echo json_encode($response);
        return;
    }
        
    $stmt = $pdo->prepare("select  DepartmentName from department where DepartmentName LIKE ? ");
    $stmt->execute([$departmentName]);
    $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet)!=0){
    $response['status'] = False;
    $response['message'] = "DepartmentName is Already Exist";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
    }
    
    $stmt = $pdo->prepare("Insert into department (DepartmentId,DepartmentName,DepartmentHead,DepartmentPhoneNumber,Floor_Id) values (?,?,?,?,?)");
    $resultSet = $stmt->execute([$_POST['DepartmentId'],$departmentName , $_POST['DepartmentHead'], $_POST['DepartmentPhoneNumber'], $_POST['Floor_Id']]);
    $response['status'] = true;
    $response['message'] = "data saved successfully";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
}

        catch (PDOException $e) {
            die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }

