<?php

include "adminAuthentication.php";

$statement = $pdo->prepare("select * from projects order by project_id ");
$statement->execute([]);
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
            <div class="container mt-3 overflow-auto">
                <div class="border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Project Details</h5>
                    <div class="d-flex gap-3">
                        <!-- <a class="btn btn-danger " id="suspendEmployee"><i class="bi bi-trash"></i></a> -->
                        <a class="btn btn-primary " href="addProject.php">Add Project</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Client</th>
                            <!-- <th>Duration</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resultSet as $row) {
                            echo "<tr>";
                            echo "<td><a type='button' class='btn' href='projectDescription.php?projectId=" . $row['project_id'] . "'>" . $row['project_id'] . "</a></td>";
                            echo "<td>" . $row['project_name'] . "</td>";
                            echo "<td>" . $row['client'] . "</td>";
                            // echo "<td>" . $row['duration'] . "</td>";
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