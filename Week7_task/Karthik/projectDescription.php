<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select p.project_id,p.project_name,e.emp_name,p.description,p.budget,p.start_date,p.end_date from projects p left join employee e on e.emp_id=p.manager where p.project_id = ?");
$statement->execute([$_GET["projectId"]]);
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
        .projectDetails {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .projectDetails:hover {
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
                    echo "<h5 class='py-3 m-0'>Project Description</h5>
<div class='d-flex'>
    <strong class='col-2'>Project ID</strong>
    <p id='projectId'>
        " . $resultSet["project_id"] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Project Name</strong>
                <p class='' id='EmpName'>
                    " . $resultSet['project_name'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Description</strong>
                <p class='' id='description'>
                    " . $resultSet['description'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Budget</strong>
                <p class='' id='budget'>
                    " . $resultSet['budget'] . "
                </p>
            </div>
            <div class='d-flex'>
            <strong class='col-2'>Start Date</strong>
            <p class='' id='budget'>
                " . $resultSet['start_date'] . "
            </p>
        </div>
        <div class='d-flex'>
        <strong class='col-2'>End Date</strong>
        <p class='' id='budget'>
            " . $resultSet['end_date'] . "
        </p>
    </div>
    <div class='d-flex'>
        <strong class='col-2'>Manager</strong>
        <p class='' id='budget'>
            " . $resultSet['emp_name'] . "
        </p>
    </div>
            <a class='btn btn-primary my-3' href='projectDetails.php'>Close</a>
            <a class='btn btn-primary my-3' href='addEmployeesToProject.php?projectId=" . $resultSet['project_id'] . "'>Add Employees</a>
        </div>";
                }
                ?>
            </div>
        </div>
            <?php
            $statement = $pdo->prepare('select e.emp_id,e.emp_name from project_mapping p,employee e where e.emp_id=p.emp_id and p.project_id=?');
            $statement->execute(array($_GET['projectId']));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="ms-lg-5 px-lg-5 col-lg-3">
            <h4>Team Members</h4>
            <table class="table table-bordered overflow-auto">
                <thead>
                    <tr class="bg-secondary text-white ">
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td><a type='button' class='btn'>" . $row['emp_id'] . "</a></td>";
                            echo "<td><a type='button' class='btn' id=" . $row['emp_id'] . ">" . $row['emp_name'] . "</a></td>";
                            echo "</tr>";
                        }
                        ?>
                </tbody>
            </table>
            </div>
        </div>
</body>

</html>