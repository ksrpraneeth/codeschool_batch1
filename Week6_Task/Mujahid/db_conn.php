<?php ob_start();

    $sname= "localhost";
    $unmae= "root";
    $password = "";
    $db_name = "student_db";


    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    $query = "SET NAMES utf8";
    mysqli_query($conn,$query);

    if (!$conn) {
        echo "Connection failed!";


    }
?>


