<?php

session_start();
include 'apis/response.php';
include 'apis/db.php';

if (!(isset($_SESSION['emp_id'])) || !(isset($_SESSION['role_id']))) {
    header("Location: login.php");
}
if ($_SESSION['role_id'] == "12") {
    header("Location: login.php");
}


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
        .attendance {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .attendance:hover {
            background-color: blue;
            opacity: 60%;
            color: white;

        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <?php 
            include "employeeHeader.php"; 
            ?>
            <div class="container">
                <form onsubmit="return false">
                    <div class="form-group d-lg-flex align-items-center">
                        <p class="p-2 col-2">Date</p>
                        <input type="date" class="form-control-md border-1 p-1" id="presentDate">
                    </div>
                    <div class="form-group d-lg-flex">
                        <p class="p-2 col-2">Status</p>
                        <div class="form-check py-2 mx-2">
                            <input class="form-check-input" type="radio" name="attendanceStatus" id="attendanceStatusPresent" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Present
                            </label>
                        </div>
                        <div class="form-check py-2 ms-5">
                            <input class="form-check-input" type="radio" name="attendanceStatus" id="attendanceStatusAbsent"
                                value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Absent
                            </label>
                        </div>
                    </div>
                    <div class="form-group d-lg-flex justify-content-between my-2">
                        <p></p>
                        <button type="submit" class="btn align-items-center btn-primary text-white px-3 py-1"
                            id="addAttendance">Add</button>
                    </div>
                </form>
            </div>
        </div>
</body>
<script>
        $("#addAttendance").click(function () {
            var formData = {
                presentDate: $("#presentDate").val(),
                attendanceStatus : $("input[type=radio][name=attendanceStatus]:checked").val(),
            }
            $.ajax({
                type: "POST",
                url: "apis/addAttendance.php",
                dataType: "JSON",
                data: formData,
                success: function (responseData) {
                    if (!responseData.status) {
                        alert(responseData.message);
                        // window.location.reload();
                    }
                    else {
                        alert("Attendance Added");
                        window.location.reload();
                    }
                }
            })
        })
</script>

</html>
