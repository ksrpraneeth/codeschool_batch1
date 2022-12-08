<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select * from employee where emp_id=?");
$statement->execute([$_GET["emp_id"]]);
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
        .employees {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .employees:hover {
            background-color: blue;
            opacity: 60%;
            color: white;

        }
        .btn-float-right {
            float: right;
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
                    echo "<h5 class='py-3 m-0'>Employee Details</h5>
<div class='d-flex'>
    <strong class='col-2'>Employee Id</strong>
    <p id='projectId'>
        " . $resultSet["emp_id"] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>First Name</strong>
                <p class='' id='EmpFirstName'>
                    " . $resultSet['emp_name'] . "
                </p>
            </div>
            <div class='d-flex'>
            <strong class='col-2'>Last Name</strong>
            <p class='' id='empLastName'>
                " . $resultSet['ph_no'] . "
            </p>
        </div>
        <div class='d-flex'>
        <strong class='col-2'>Last Name</strong>
        <p class='' id='empLastName'>
            " . $resultSet['email'] . "
        </p>
    </div>
            <div class='d-flex'>
                <strong class='col-2'>Last Name</strong>
                <p class='' id='empLastName'>
                    " . $resultSet['salary'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Data of Birth</strong>
                <p class='' id='DOB'>
                    " . $resultSet['dob'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Address</strong>
                <p class='' id='address'>
                    " . $resultSet['emp_address'] . "
                </p>
            </div>
            <div class='d-flex'>
            <strong class='col-2'>Joined Date</strong>
            <p class='' id='dateJoined'>
                " . $resultSet['date_joined'] . "
            </p>
        </div>
        <div class='d-flex my-3 gap-5'>
        <a data-id='" . $resultSet['emp_id'] . "' class='btn btn-danger' id='deleteEmployee' name='suspend' onclick='delEmployee(this)'  value='suspend'>Remove</a>
            <a  class='btn btn-primary' id='editEmployee' name='edit' href='updateEmployee.php?emp_id=" . $resultSet['emp_id'] . "'  value='edit'>Edit Details</a>
        </div>
        <a class='btn btn-primary btn-float-right' id='close' name='close'  href='employees.php'>Close</a>
        </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <script>
           function delEmployee(ele) {
        if (confirm("Remove Employee")) {
            let emp_id = JSON.stringify([ele.dataset.id]);
            $.ajax({
                url: 'apis/delEmployee.php',
                type: 'POST',
                data: { empIds: emp_id },
                dataType: "json",
                success: function (data) {
                    if (data.status == true) {
                        location.reload();
                        return true;
                    }
                    else {
                        alert(data.message);
                    }
                }
            })
        }
        else {
            return false;
        }
    }
    </script>
</body>

</html>