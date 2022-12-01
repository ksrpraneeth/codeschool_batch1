<?php

    include "db.php";
    include "response.php";

    if (!array_key_exists('empidInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee ID";
        echo json_encode($response);
        return;
    }
    $empidInput = $_POST['empidInput'];
    if (!array_key_exists('empNameInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter Employee Name";
        echo json_encode($response);
        return;
    }
    $empNameInput = $_POST['empNameInput'];
    if (!array_key_exists('empSalaryInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee salary";
        echo json_encode($response);
        return;
    }
    $empSalaryInput = $_POST['empSalaryInput'];
    if (!array_key_exists('empPhnoInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a employee Ph.no";
        echo json_encode($response);
        return;
    }
    $empPhnoInput = $_POST['empPhnoInput'];
    if (!array_key_exists('empEmailInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee Email";
        echo json_encode($response);
        return;
    }
    $empEmailInput = $_POST['empEmailInput'];
    if (!array_key_exists('empPasswordInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a Password address";
        echo json_encode($response);
        return;
    }
    $empPasswordInput = $_POST['empPasswordInput'];
    if (!array_key_exists('jobRoleIdInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a Role ID";
        echo json_encode($response);
        return;
    }
    $jobRoleIdInput = $_POST['jobRoleIdInput'];
    if(strlen($empidInput)==0)
    {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee ID";
        echo json_encode($response);
        return;
    }
    if(strlen($empNameInput)==0)
    {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee Name";
        echo json_encode($response);
        return;
    }
    if(strlen($empSalaryInput)==0)
    {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee Salary";
        echo json_encode($response);
        return;
    }
    if(strlen($empEmailInput)==0)
    {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee Email";
        echo json_encode($response);
        return;
    }
    if(strlen($empPasswordInput)==0)
    {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee Password";
        echo json_encode($response);
        return;
    }
    if (!preg_match("/[0-9]{10}/",$empPhnoInput)) {
        $response['status'] = false;
        $response['message'] = "Ph No Should be 10 digits";
        echo json_encode($response);
        return;
    }

try {

    $statement = $pdo->prepare("select * from employee where emp_id=? or ph_no=? or email=?");
    $statement->execute([($_POST['empidInput']),($_POST['empPhnoInput']), ($_POST['empEmailInput'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet)!=0){
    $response['status'] = False;
    $response['message'] = "Employee Already Exists";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
    }

    $statement = $pdo->prepare("insert into employee(emp_id,emp_name,salary,ph_no,email,password,role_id) values(?,?,?,?,?,?,?)");
    $statement->execute([($_POST['empidInput']), ($_POST['empNameInput']), ($_POST["empSalaryInput"]), ($_POST['empPhnoInput']), ($_POST['empEmailInput']), md5($_POST['empPasswordInput']), ($_POST['jobRoleIdInput'])]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $response['status'] = true;
    $response['message'] = "Employee added";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}
?>