<?php

include "adminAuthentication.php";


$statement = $pdo->prepare("SELECT sv.*, es.id FROM emp_salary_view sv
LEFT JOIN emp_salary_status es
    ON sv.emp_id=es.emp_id AND sv.credited_month = extract(month from es.date_paid)
    AND sv.credited_year = extract(year from es.date_paid)
WHERE es.id IS NULL AND sv.emp_id != ? and sv.credited_month<extract(month from current_date);");
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
                <?php
                if(count($resultSet)==0){?>
                <p>No Data </p><?php } else{?>
                <table class="table table-bordered">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Salary To Be Credited</th>
                            <th>No. of days present</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultSet as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['emp_id'] . "</td>";
                            echo "<td id=" . $row['emp_id'] . ">" . $row['emp_name'] . "</td>";
                            echo "<td>" . $row['credited_month'] . "</td>";
                            echo "<td>" . $row['credited_year'] . "</td>";
                            echo "<td>" . $row['salary_credited']/12 . "</td>";
                            echo "<td>" . $row['total_days_present'] . "</td>";
                            echo "<td><button data-id=" . $row['emp_id'] . " data-month=" . $row['credited_month'] . " data-year=" . $row['credited_year'] . " data-salary=" . $row['salary_credited'] . " class='btn btn-primary'  name='updateSalaryStatus'  value='paid'>Confirm  </button>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table><?php }?>
            </div>
            <div class="container mt-3 overflow-auto">
                <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Employee Salary Details</h5>
                </div>
                <table class="table table-bordered">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Approved Id</th>    
                            <th>Employee Id</th>
                            <th>Employee Name</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Salary Credited</th>
                            <th>No. of days present</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $statement = $pdo->prepare("select s.*,e.emp_name from emp_salary_updated_view s,employee e where s.emp_id=e.emp_id");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>". $row['id']. "</td>";
                            echo "<td>" . $row['emp_id'] . "</td>";
                            echo "<td id=" . $row['emp_id'] . ">" . $row['emp_name'] . "</td>";
                            echo "<td>" . $row['credited_month'] . "</td>";
                            echo "<td>" . $row['credited_year'] . "</td>";
                            echo "<td><a class='btn' id='salaryCredited' href='employeeSalaryPaySlip.php?confirmId=" . $row['id'] . "'>" . ($row['salary_credited'] / 12) . "</a></td>";
                            echo "<td>" . $row['total_days_present'] . "</td>";
                            echo "<td class='text-success bold' style='font-weight:bold;'>Credited</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
        $("button[name=updateSalaryStatus]").click(function () {
            var emp_id = $(this).data("id");
            var month = $(this).data("month");
            var year = $(this).data("year");
            var salary_credited = $(this).data("salary");
            $.ajax({
                url: "apis/employeeSalaryUpdate.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    emp_id: emp_id,
                    month: month,
                    year: year,
                    salary_credited: salary_credited
                },
                success: function(data)  {
                    if (data.status == true) {
                        location.reload();
                        alert(data.message)
                        return true;
                    }
                    else {
                        alert(data.message);
                    }
                },
                error: (error) => {
                    console.log(error);
                }   
            })
        })
</script>
</html>