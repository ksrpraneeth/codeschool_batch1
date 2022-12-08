<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select * from  employee");
$statement->execute([]);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                <div class='d-flex'>
                    <strong class='col-2'>Add Employee</strong>
                    <select class='form-control mx-0' id='AddEmployeeToProjectInput' name='AddEmployeeToProjectInput'>
                        <option value=''>Select</option>
                        <?php
                        foreach ($result as $row) {
                            echo "<option value='" . $row['emp_id'] . "'>" . $row['emp_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <a class='btn btn-primary my-3' id="AddEmployeeToProjectButton">Add Employees</a>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $("#AddEmployeeToProjectButton").click(function () {
            var AddEmployeeToProjectInput = $("#AddEmployeeToProjectInput").val();
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const projectId = urlParams.get('projectId')
            console.log(projectId);
            $.ajax({
                url: 'apis/AddEmployeeToProject.php',
                type: 'POST',
                data: {
                    AddEmployeeToProjectInput,
                    projectId
                },
                dataType: 'JSON',
                success: function (responseData) {
                    if (responseData.status) {
                        alert(responseData.message);
                        window.location.assign("projectDescription.php?projectId=" + projectId);
                    } else {
                        alert(responseData.message);
                    }
                }
            })
        })
    })
</script>

</html>