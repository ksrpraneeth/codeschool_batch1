<?php
    include "db.php";
    include "response.php";
    if (!array_key_exists('empIdInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter Employee Id";
        echo json_encode($response);
        return;
    }
    $empIdInput = $_POST['empIdInput'];
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
    if (!array_key_exists('empAddressInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a address";
        echo json_encode($response);
        return;
    }
    $empAddressInput = $_POST['empAddressInput'];
    if (!array_key_exists('jobRoleIdInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter a Role ID";
        echo json_encode($response);
        return;
    }
    $jobRoleIdInput = $_POST['jobRoleIdInput'];
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
    if(strlen($empAddressInput)==0)
    {
        $response['status'] = false;
        $response['message'] = "Please enter a Employee Address";
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

    $statement = $pdo->prepare("update employee set emp_name=?,salary=?,ph_no=?,email=?,role_id=?,emp_address=? where emp_id=?");
    $statement->execute([$empNameInput,$empSalaryInput,$empPhnoInput,$empEmailInput,$jobRoleIdInput,$empAddressInput,$empIdInput]);
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