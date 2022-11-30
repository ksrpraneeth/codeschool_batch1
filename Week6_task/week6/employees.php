<?php

include "adminAuthentication.php";


$statement = $pdo->prepare("select e.*,j.role_name from employee e,job_role j where j.id=e.role_id and e.emp_id!=? order by e.emp_id ");
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
        .employees {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .employees:hover {
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
                    <h5 class="m-0">Employee Details</h5>
                    <div class="d-flex gap-3">
                        <a class="btn btn-danger " id="suspendEmployee"><i class="bi bi-trash"></i></a>
                        <a class="btn btn-primary " href="addEmployee.php">Add Employee</a>
                    </div>
                </div>
                <table class="table table-bordered overflow-auto">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Salary</th>
                            <th>Ph No</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultSet as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['emp_id'] . "</td>";
                            echo "<td>" . $row['emp_name'] . "</td>";
                            echo "<td>" . $row['salary'] . "</td>";
                            echo "<td>" . $row['ph_no'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['role_name'] . "</td>";
                            echo "<td><input data-id='" . $row['emp_id'] . "' type='checkbox'  name='suspend' value='suspend'></td>";
                            echo "<td><a data-id='" . $row['emp_id'] . "'class='btn btn-danger'  name='suspend' value='suspend'></a>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                </div>
            </div>
        </div>
</body>
<script>
    $(document).ready(function () {
        $('#suspendEmployee').click(function () {
            var checkboxs = $("input[type=checkbox][name=suspend]:checked");
            let empIds = []
            for (let index = 0; index < checkboxs.length; index++) {
                empIds.push($(checkboxs[index]).data("id"));
            }

            $.ajax({
                type: "POST",
                data: { empIds: JSON.stringify(empIds) },
                url: "apis/delEmployee.php",
                dataType: "json",
                success: function (data) {
                    if (data.status == true) {
                       if(confirm("Remove Employee")){
                           location.reload();
                           return true;
                       }
                       else{
                           return false;
                       }
                        
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                }
            })
        })
    })
</script>

</html>