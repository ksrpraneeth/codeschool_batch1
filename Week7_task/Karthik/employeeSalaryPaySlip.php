<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select s.*,e.emp_name,e.salary from emp_salary_status s,employee e,employee es where s.emp_id=e.emp_id and id=? ");
$statement->execute([$_GET["confirmId"]]);
$resultSet = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <style>
        .empSalary {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .empSalary:hover {
            background-color: blue;
            opacity: 60%;
            color: white;

        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "adminHeader.php"
                ?>
            <div class="container mt-3">
                <?php
                if ($resultSet == false) {
                    echo "No Data found!";
                } else {
                    echo "<h5 class='py-3 m-0'>Salary Details</h5>
<div class='d-flex'>
    <strong class='col-2'>Confirm ID</strong>
    <p id='confirmId'>
        " . $resultSet["id"] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Employee Id</strong>
                <p class='' id='empId'>
                    " . $resultSet['emp_id'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Employee Name</strong>
                <p class='' id='employeeName'>
                    " . $resultSet['emp_name'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Credited Salary</strong>
                <p class='' id='budget'>
                    " . $resultSet['salary_credited'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Tax Amount</strong>
                <p class='' id='budget'>
                    " . $resultSet['salary_credited']/10 . "
                </p>
            </div>
            <div class='d-flex'>
            <strong class='col-2'>Basic Pay</strong>
            <p class='' id='budget'>
                " . $resultSet['salary']/1.2 . "
            </p>
        </div>
            <div class='d-flex'>
            <strong class='col-2'>Salary Confirmed Date</strong>
            <p class='' id='dateConfirm'>
                " . $resultSet['paid_time'] . "
            </p>
        </div>
        <div class='d-flex'>
        <strong class='col-2'>Confirmed By</strong>
        <p class='' id='confirmedBy'>
            " . $resultSet['updated_by'] . "
        </p>
    </div>
    <div class='d-flex'>
        <strong class='col-2'>Salary Credited Date</strong>
        <p class='' id='creditedDate'>
            " . $resultSet['date_paid'] . "
        </p>
    </div>
            <a class='btn btn-primary my-3' href='employeeSalary.php'>Close</a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>