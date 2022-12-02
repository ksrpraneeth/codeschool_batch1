<?php
session_start();
if($_SESSION['role_id']==12){
    include "adminAuthentication.php";
}
else{
    include "employeeAuthentication.php";
}
$statement = $pdo->prepare("select e.*,j.role_name from employee e,job_role j where j.id=e.role_id and e.emp_id=?");
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
            if($_SESSION['role_id']==12){
                include "adminHeader.php";
            }
            else{
                include "employeeHeader.php";
            }
            
            ?>
            <div class="container mt-3">
                <h5 class="align-items-center border-bottom py-2">Profile</h5>
                <br>
                <div class="d-flex">
                    <strong class="col-2">Emp.Id</strong>
                    <p id="EmpId">
                        <?php echo $resultSet[0]["emp_id"] ?>
                    </p>
                </div>
                <div class="d-flex">
                    <strong class="col-2">Employee Name</strong>
                    <p class="" id="EmpName">
                        <?php echo $resultSet[0]["emp_name"] ?>
                    </p>
                </div>
                <div class="d-flex">
                    <strong class="col-2">Salary</strong>
                    <p class="col-4" id="salary">
                        <?php echo $resultSet[0]["salary"] ?>
                    </p>
                </div>
                <div class="d-flex">
                    <strong class="col-2">Ph.No</strong>
                    <p class="col-4" id="phNo">
                        <?php echo $resultSet[0]["ph_no"] ?>
                    </p>
                </div>
                <div class="d-flex">
                    <strong class="col-2">Email</strong>
                    <p class="col-4" id="email">
                        <?php echo $resultSet[0]["email"] ?>
                    </p>
                </div>
            <a class="btn btn-primary" href="changePassword.php">Change Password</a>
            </div>
        </div>
    </div>
</body>

</html>