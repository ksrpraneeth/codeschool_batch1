<?php

session_start();
if ($_SESSION['role_id'] == 12) {
    include "adminAuthentication.php";
} else {
    include "employeeAuthentication.php";
}

$statement = $pdo->prepare(" select *from employee where emp_id!=?");
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
            <div class="container  mt-3">
                <div class="d-flex justify-content-between py-2">
                    <h5 class="align-items-center">Messages</h5>
                    <!-- <a class="btn bg-primary text-white" href="chat.php">Send Message</a> -->
                </div>
                <div class="d-flex py-2">
                    <ul class="list-group">
                        <?php
                        foreach ($resultSet as $row)
                            echo "<a class='list-group-item' href='chat.php?to_empid=" . $row['emp_id'] . "'>" . $row['emp_name'] . "</a>";
                        ?>
                    </ul>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>