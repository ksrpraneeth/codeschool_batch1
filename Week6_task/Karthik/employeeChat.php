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

$statement = $pdo->prepare("select * from employee where emp_id!=?");
$statement->execute([$_SESSION['emp_id']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

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
        .employeechat {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .employeechat:hover {
            background-color: blue;
            opacity: 60%;
            color: white;

        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <?php include "employeeHeader.php"; ?>
            <div class="container">
                <form onsubmit="return false">
                    <div class="form-group d-lg-flex">
                        <p class="p-2 col-2">To</p>
                        <select class="form-control" id="toEmpId">
                            <option value="" selected disabled>Select</option>
                            <?php
                            foreach ($resultSet as $row) {
                                echo '<option value="' . $row['emp_id'] . '">' . $row['emp_name'] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group d-lg-flex">
                        <p class="p-2 col-2">Message</p>
                        <textarea class="form-control" id="message" placeholder="Enter Message"></textarea>
                    </div>
                    <div class="form-group d-lg-flex justify-content-between my-2">
                        <p></p>
                        <button type="submit" class="btn align-items-center btn-primary text-white px-3 py-1"
                            id="sendMessage">Send</button>
                </form>
</body>
<script>
    $(document).ready(function () {
        $("#sendMessage").click(function () {
            var formData = {
                toEmpId: $("#toEmpId").val(),
                message: $("#message").val()
            }
            $.ajax({
                type: "POST",
                url: "apis/employeeChat.php",
                dataType: "JSON",
                data: formData,
                success: function (responseData) {
                    if (!responseData.status) {
                        alert(responseData.message);
                        // window.location.reload();
                        return;
                    }
                    else {
                        alert(responseData.message);
                        window.location.reload();
                    }
                }
            })
        })
    })
</script>

</html>