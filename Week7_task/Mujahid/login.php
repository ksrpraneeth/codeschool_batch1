<?php
session_start();
//Database Configuration File
include('conn.php');

if (isset($_POST['login'])) {

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $saltedpasswrd = hash('sha256', $password);
    // Fetch stored password  from database on the basis of username/email 
    $sql = "SELECT UserName,UserEmail,LoginPassword FROM userdata WHERE (UserName=:usname || UserEmail=:usname)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':usname', $uname, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $fetchpassword = $result->LoginPassword;
            // hashing for stored password
            $storedpass = hash('sha256', $fetchpassword);
        }

        // Hashing of the post password
        $hash = password_hash($saltedpasswrd, PASSWORD_DEFAULT);
        // Verifying Post password againt stored password
        if (password_verify($storedpass, $hash)) {


            $_SESSION['userlogin'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
        } else {
            header('Location: index.php?error=Incorect User name or password');
            exit();
        }

    } else {
        $_SESSION['status'] = "INVALID EMAIL OR PASSWORD";
        header('Location: index.php?error=Incorect User name or password');
        exit();
    }
}
?>