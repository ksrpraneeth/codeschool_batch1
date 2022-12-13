<?php
session_start();
include "./../db.php";
if($_POST['data']['source']=='normal'){
    normalValidation();
}
function normalValidation(){
    global $db, $host, $user, $password;
    $errors = [];
    $usernameLogin = $_POST['data']['usernameLogin'];
    $passwordLogin= $_POST['data']['passwordLogin'];
    if(count($errors)>0){
        echo json_encode(['status'=>false, 'errors'=> $errors]);
    }else{
        try {
            $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
            // make a database connection
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
          
            // prepare stmts
            $statement = $pdo->prepare("select * from users where username=? and password= ?");
            $statement->execute([$_POST['data']['usernameLogin'], md5($_POST['data']['passwordLogin'])]);
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
            //check if present in database
            if (count($resultSet) == 0) {
            echo json_encode(['status'=>false, 'message'=>'Username or password incorrect!']);
                return;
            }
            //if username exists
            $row=$resultSet[0];
            if($row['usertype'] == 'admin'){
                $_SESSION["adminId"] = $row["id"];
            } else {
            $_SESSION["userId"] = $row["id"];
            }
            echo json_encode(['status'=>true, 'message'=>'Login successful!','data'=>$row]);
            return;
        } catch (PDOException $e) {
            echo json_encode(["status"=>false,"message"=>"not connected"]);
        }
    }
}

