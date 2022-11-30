<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select p.*,e.emp_name from projects p,project_mapping pm,employee e where e.emp_id=pm.emp_id and p.project_id=pm.project_id and pm.emp_id!=? order by pm.emp_id ");
$statement->execute([$_SESSION['emp_id']]);
$resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
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
                <h5 class="py-3 m-0">Project Details</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Client</th>
                            <th>Duration (in.Months)</th>
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultSet as $row) {
                            echo "<tr>";
                            echo "<td><a type='button' class='btn' href='projectDescription.php?projid=" . $row['project_id'] . "'>" . $row['project_id'] . "</a></td>";
                            echo "<td>" . $row['project_name'] . "</td>";
                            echo "<td>" . $row['client'] . "</td>";
                            echo "<td>" . $row['duration'] . "</td>";
                            echo "<td>" . $row['emp_name'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>