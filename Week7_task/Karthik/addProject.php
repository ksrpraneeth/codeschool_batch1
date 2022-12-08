<?php
include "adminAuthentication.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
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
                <div class="border-bottom py-3 justify-content-between align-items-center">
                    <h5>Add Project</h5>
                </div>
                <form class=" my-2" onclick="return false" autocomplete="off">
                    <div class="form-group d-flex">
                        <p class="col-4">Project Id</p>
                        <input type="text" class="form-control my-1" id="projectIdInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">Project Name</p>
                        <input type="text" class="form-control my-1" id="projectNameInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">Client</p>
                        <input type="text" class="form-control my-1" id="projectClientInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">Description</p>
                        <input type="textarea" class="form-control my-1" id="projectDescriptionInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">Start date</p>
                        <input type="date" class="form-control my-1" id="projectStartDateInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">End date</p>
                        <input type="date" class="form-control my-1" id="projectEndDateInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">Budget</p>
                        <input type="text" class="form-control my-1" id="projectBudgetInput">
                    </div>
                    <div class="form-group d-flex">
                        <p class="col-4">Manager</p>
                        <select class='form-control' id='empIdInput' required>
                            <option value="" selected disabled>Select</option>
                            <?php
                        $statement = $pdo->prepare("select *from employee");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {
                                echo "<option value=" . $row['emp_id'] . ">" . $row['emp_name'] . "</option>";
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <p id="errors text-danger"></p>
                    <div class="d-flex justify-content-between">
                        <p></p>
                        <button type="submit" class="btn btn-primary text-white px-3 py-1"
                            id="addProjectButton">Add</button>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $("#addProjectButton").click(function () {
            var formData = {
                projectIdInput: $("#projectIdInput").val(),
                projectNameInput: $("#projectNameInput").val(),
                projectClientInput: $("#projectClientInput").val(),
                projectDescriptionInput: $("#projectDescriptionInput").val(),
                projectStartDateInput: $("#projectStartDateInput").val(),
                projectEndDateInput: $("#projectEndDateInput").val(),
                projectBudgetInput: $("#projectBudgetInput").val(),
                empIdInput: $("#empIdInput").val()
            }
            $.ajax({
                type: "POST",
                url: "apis/addProject.php",
                dataType: "JSON",
                data: formData,
                success: function (responseData) {
                    if (!responseData.status) {
                        alert(responseData.message);
                        
                    }
                    else {
                        alert("Project Added");
                        window.location.assign('projectDetails.php');
                    }
                }
            })
        })
    </script>
    </body>

</html>