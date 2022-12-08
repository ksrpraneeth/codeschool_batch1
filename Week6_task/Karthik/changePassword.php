<?php

include 'apis/response.php';
include 'apis/db.php';
session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <style>
        .profile {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .profile:hover {
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
            <form class="form-control text-center py-5"  onsubmit="return false">
                <div class="form-group py-4">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control-sm ms-4" id="newPasswordInput" name="newPasswordInput" placeholder="Enter New Password">
                </div>
                <button type="button" id="changePassword" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
    <script>
            $('#changePassword').click(function(){
                var  newPasswordInput=$('#newPasswordInput').val();
                $.ajax({
                    type: "POST",
                    url: "apis/changePassword.php",
                    dataType:'JSON',
                    data: {
                        newPasswordInput
                    },
                    success: function (responseData) {
                        if (!responseData.status) {
                            alert(responseData.message);
                        }
                        else {
                            alert("Password changed");
                            window.location.assign('employeeProfile.php');
                        }
                    }
                })       
            });
    </script>
</body>

</html>