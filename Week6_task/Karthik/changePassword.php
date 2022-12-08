<?php
session_start();
if ($_SESSION['role_id'] == 12) {
    include "adminAuthentication.php";
} else {
    include "employeeAuthentication.php";
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
        <div class="row col-xs-12">
            <?php
        if ($_SESSION['role_id'] == 12) {
            include "adminHeader.php";
        } else {
            include "employeeHeader.php";
        }
        ?>
            <form class="form form-control-md passwordChangeForm py-5 justify-content-center align-items-center"
                onsubmit="return false">
                <div class="form-group  justify-content-between d-flex">
                    <label for="password" class="col-6">Old Password</label>
                    <input type="password" class="form-control-sm ms-4" id="oldPasswordInput" name="oldPasswordInput"
                        placeholder="Enter New Password">
                </div>
                <div class="form-group my-2 justify-content-between d-flex">
                    <label for="password" class="col-6">New Password</label>
                    <input type="password" class="form-control-sm ms-4" id="newPasswordInput" name="newPasswordInput"
                        placeholder="Enter New Password">
                </div>
                <div class="form-group my-2 justify-content-between d-flex">
                    <label for="password" class="col-6">Confirm New Password</label>
                    <input type="password" class="form-control-sm ms-4" id="confirmNewPasswordInput"
                        name="confirmNewPasswordInput" placeholder="Enter Confirm Password">
                </div>
                <div class="form-group my-3 justify-content-center d-flex">
                    <button type="button" id="changePassword" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#changePassword').click(function () {
            var PasswordInput = {
                newPasswordInput: $('#newPasswordInput').val(),
                confirmNewPasswordInput: $('#confirmNewPasswordInput').val(),
                oldPasswordInput: $('#oldPasswordInput').val(),
            }
            $.ajax({
                type: "POST",
                url: "apis/changePassword.php",
                dataType: 'JSON',
                data: PasswordInput,
                success: function (responseData) {
                    if (!responseData.status) {
                        alert(responseData.message);
                    }
                    else {
                        alert("Password changed");
                        window.location.assign('Profile.php');
                    }
                }
            })
        });
    </script>
</body>

</html>