<?php

    include "db.php";
    include "response.php";
    session_start();
    if (!array_key_exists('presentDate', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please enter Date";
        echo json_encode($response);
        return;
    }
    $presentDate = $_POST['presentDate'];
    if (!array_key_exists('attendanceStatus', $_POST)) {
        $response['status'] = false;
        $response['message'] = "Please Select Status";
        echo json_encode($response);
        return;
    }
    $attendanceStatus = $_POST['attendanceStatus'];
    if($presentDate>date("Y-m-d")){
        $response['status'] = false;
        $response['message'] = "Please enter a valid date";
        echo json_encode($response);
        return;
    }
try {

    $statement = $pdo->prepare("select * from emp_attendance where emp_id=? and date=?");
    $statement->execute([($_SESSION['emp_id']),$presentDate]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(count($resultSet)!=0){
    $response['status'] = false;
    $response['message'] = "Attendance marked already";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
    }

    $statement = $pdo->prepare("insert into emp_attendance(emp_id,date,status) values(?,?,?)");
    $statement->execute([($_SESSION['emp_id']),$presentDate,$attendanceStatus]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    $response['status'] = true;
    $response['message'] = "Attendance marked";
    $response['data'] = $resultSet;
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}
?>