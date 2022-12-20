<?php
include "adminAuthentication.php"
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <div class="container-fluid">
        <div class="row">
            <?php
            include "adminHeader.php"
                ?>
            <div class="container mt-3">
                <div class="border-bottom py-3 justify-content-between align-items-center">
                    <h5>Add Employee</h5>
                </div>
                <form class="form my-2" onclick="return false" autocomplete="off">
                    <div class="d-flex">
                        <p class="col-4">Employee Id</p>
                        <input type="text" class="form-control my-1" id="empidInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Employee Name</p>
                        <input type="text" class="form-control my-1" id="empNameInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Salary</p>
                        <input type="text" class="form-control my-1" id="empSalaryInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Phone Number</p>
                        <input type="text" class="form-control my-1" id="empPhnoInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Email</p>
                        <input type="text" class="form-control my-1" id="empEmailInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Password</p>
                        <input type="text" class="form-control my-1" id="empPasswordInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Job role</p>
                        <select class='form-control' id='jobRoleIdInput' required>
                            <option value="" selected disabled>Select</option>
                            <?php
                        $statement = $pdo->prepare("select *from job_role");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {

                                echo "<option value=" . $row['id'] . ">" . $row['role_name'] . "</option>";
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Address</p>
                        <input type="text" class="form-control my-1" id="empAddressInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Date of Birth</p>
                        <input type="date" class="form-control my-1" id="empDobInput">
                    </div>
                    <div class="d-flex">
                        <p class="col-4">Date Joined</p>
                        <input type="date" class="form-control my-1" id="empJoinedDateInput">
                    </div>
                    <p id="errors text-danger"></p>
                    <div class="d-flex justify-content-between">
                        <p></p>
                        <button type="submit" class="btn btn-primary text-white px-3 py-1"
                            id="addEmployeeButton">Add</button>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $("#addEmployeeButton").click(function () {
            var formData = {
                empidInput: $("#empidInput").val(),
                empNameInput: $("#empNameInput").val(),
                empSalaryInput: $("#empSalaryInput").val(),
                empPhnoInput: $("#empPhnoInput").val(),
                empEmailInput: $("#empEmailInput").val(),
                empPasswordInput: $("#empPasswordInput").val(),
                jobRoleIdInput: $("#jobRoleIdInput").val(),
                empAddressInput: $("#empAddressInput").val(),
                empDobInput: $("#empDobInput").val(),
                empJoinedDateInput: $("#empJoinedDateInput").val()
            }
            $.ajax({
                type: "POST",
                url: "apis/addEmployee.php",
                dataType: "JSON",
                data: formData,
                success: function (responseData) {
                    if (!responseData.status) {
                        alert(responseData.message);
                    }
                    else {
                        alert("Employee Added");
                        window.location.assign('employees.php');
                    }
                }
            })
        })
    </script>
    </body>

</html>