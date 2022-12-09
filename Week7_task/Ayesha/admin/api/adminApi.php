<?php
include "./../db.php";
session_start();
if($_POST['data']['source']=='normal'){
    normalValidation();
}
function normalValidation(){
    global $db, $host, $user, $password;
    $errors = [];
    $adminUsername = $_POST['data']['adminUsername'];
    $adminPassword= $_POST['data']['adminPassword'];
    if(count($errors)>0){
        echo json_encode(['status'=>false, 'errors'=> $errors]);
    }else{
        try {
            $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
            // make a database connection
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
          
            // prepare stmts
            $statement = $pdo->prepare("select * from admin where name=? and password= ?");
            $statement->execute([$_POST['data']['adminUsername'],($_POST['data']['adminPassword'])]);
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
            //check if present in database
            if (count($resultSet) == 0) {
            echo json_encode(['status'=>false, 'message'=>'Username or password incorrect!']);
                return;
            }
            //if username exists
            $row=$resultSet[0];
            $_SESSION["adminId"] = $row["id"];
            echo json_encode(['status'=>true, 'message'=>'Login successful!','data'=>[$resultSet]]);
            return;
        } catch (PDOException $e) {
            echo json_encode(["status"=>false,"message"=>"not connected"]);
        }
    }
}