<?php

    include "db.php";
    include "response.php";

    
    if (!array_key_exists('enterBankAcInput', $_POST)) {
        $response['status'] = false;
        $response['message'] = "data is not provided.";
        echo json_encode($response);
        return;
    }
    if($presentDate>date("Y-m-d")){
        $response['status'] = false;
        $response['message'] = "Please enter a valid date";
        echo json_encode($response);
        return;
    }
    try{

        $statement = $pdo->prepare("insert into employee_bill(emp_id,total_earnings,total_deductions,net_amount,month,year) values(?,?,?,?,?,?)");
        $statement->execute([($_SESSION['emp_id'])]);
        $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        $response['status'] = true;
        $response['message'] = "Data Inserted";
        $response['data'] = $resultSet;
        echo json_encode($response);
        return;
    } catch (PDOException $e) {
        $response['status'] = false;
        $response['message'] = $e->getMessage();
        echo json_encode($response);
    }
?>