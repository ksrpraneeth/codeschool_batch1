<?php
include "db.php";
include "response.php";
session_start();
if (!array_key_exists("emp_id", $_POST)) {
    $response['status'] = false;
    $response['message'] = "Enter employee Id";
    echo json_encode($response);
    return;
}
$emp_id = $_POST['emp_id'];

if (!array_key_exists("month", $_POST)) {
    $response['status'] = false;
    $response['message'] = "Enter Credited Month";
    echo json_encode($response);
    return;
}
$month = $_POST['month'];

if (!array_key_exists("year", $_POST)) {
    $response['status'] = false;
    $response['message'] = "Enter Credited year";
    echo json_encode($response);
    return;
}
$year = $_POST['year'];

if (!array_key_exists("salary_credited", $_POST)) {
    $response['status'] = false;
    $response['message'] = "Enter Credited Salary";
    echo json_encode($response);
    return;
}
$salary_credited = $_POST['salary_credited'];

$date = date('Y-m-d' ,strtotime("$year-$month-01 00:00"));

try {
    $statement = $pdo->prepare("select * from emp_salary_status where emp_id=? and extract(month from date_paid)=? and extract(year from date_paid)=?");
    $statement->execute([$emp_id,$month,$year]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) != 0) {
        $response['status'] = false;
        $response['message'] = "Status already updated";
        $response['data'] = $resultSet;
        echo json_encode($response);
        return;
    }
    $statement = $pdo->prepare("insert into emp_salary_status(emp_id,date_paid,status,salary_credited,updated_by) values(?,?,'true',?,?)");
    $statement->execute([$emp_id,$date,$salary_credited,($_SESSION['emp_id'])]);
    $response['status'] = true;
    $response['message'] = "Status updated successfully";
    echo json_encode($response);
    return;
}
catch (PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}