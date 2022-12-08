<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select p.project_id,p.project_name,pd.description,e.emp_name,pd.budget from employee e,projects p,project_mapping pm,project_details pd where e.emp_id=pm.emp_id and p.project_id=pd.project_id and p.project_id=pm.project_id AND p.project_id = ?");
$statement->execute([$_GET["projid"]]);
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
                    if($resultSet == false){
                        echo "No Data found!";
                    } else {
echo "<h5 class='py-3 m-0'>Project Description</h5>
<div class='d-flex'>
    <strong class='col-2'>Project ID</strong>
    <p id='projectId'>
        ". $resultSet["project_id"] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Project Name</strong>
                <p class='' id='EmpName'>
                    " .$resultSet['project_name'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Description</strong>
                <p class='' id='description'>
                    " . $resultSet['description'] ."
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Manager</strong>
                <p class='' id='emp_name'>
                    " . $resultSet['emp_name'] . "
                </p>
            </div>
            <div class='d-flex'>
                <strong class='col-2'>Budget</strong>
                <p class='' id='budget'>
                    " . $resultSet['budget'] . "
                </p>
            </div>
            <a class='btn btn-primary my-3' href='projectDetails.php'>Close</a>
        </div>";
        }
        ?>

            </div>
        </div>
    </div>
</body>

</html>