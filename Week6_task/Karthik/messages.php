<?php

session_start();
if ($_SESSION['role_id'] == 12) {
    include "adminAuthentication.php";
} else {
    include "employeeAuthentication.php";
}

$statement = $pdo->prepare("select from_empid,message,message_date from messages where to_empid=? order by message_date desc ");
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
        .chat {
            background-color: blue;
            opacity: 60%;
            color: white;
        }

        .chat:hover {
            background-color: blue;
            opacity: 60%;
            color: white;

        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <?php
            if ($_SESSION['role_id'] == 12) {
                include "adminHeader.php";
            } else {
                include "employeeHeader.php";
            }
            ?>
            <div class="container mt-3">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="align-items-center">Employee Details</h5>
                    <a class="btn bg-primary text-white" href="chat.php">Send Message</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>Mark as read</th>
                            <th>Employee ID</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
          foreach ($resultSet as $row) {
              echo "<tr>";
              echo "<td>" .'<input type="checkbox" id="suspendEmployee" name="suspend" value="suspend">' . "</td>";
              echo "<td>" . $row['from_empid'] . "</td>";
              echo "<td>" . $row['message'] . "</td>";
              echo "<td>" . $row['message_date'] . "</td>";
              echo "</tr>";
          }
          ?>
                    </tbody>
                </table>
</body>

</html>