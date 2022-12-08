<?php

include "adminAuthentication.php";


$statement = $pdo->prepare(" select e.emp_id,e.emp_name,p.month, p.no_of_working_days,p.salary_credited,a.count total_days_present FROM employee e, pay_roll p, (select emp_id, count(status) count FROM  emp_attendance GROUP BY emp_id) a where e.emp_id=a.emp_id and p.emp_id=e.emp_id and e.emp_id!=?;");
$statement->execute([$_SESSION['emp_id']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <style>
        .empSalary {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .empSalary:hover {
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
            <div class="container mt-3 overflow-auto">
                <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Employee Salary Details</h5>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Month</th>
                            <th>Total Working Days</th>
                            <th>Salary Credited</th>
                            <th>No. of  days present</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultSet as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['emp_id'] . "</td>";
                            echo "<td>" . $row['emp_name'] . "</td>";
                            echo "<td>" . $row['month'] . "</td>";
                            echo "<td>" . $row['no_of_working_days'] . "</td>";
                            echo "<td>" . $row['salary_credited'] . "</td>";
                            echo "<td>" . $row['total_days_present'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>