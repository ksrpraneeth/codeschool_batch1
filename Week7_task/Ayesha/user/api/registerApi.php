<?php
include "./../db.php";
if($_POST['data']['source']=='normal'){
    normalValidation();
}
function normalValidation(){
    global $db, $host, $user, $password;
    $errors = [];

    $registerEmail = $_POST['data']['registerEmail'];
    $registerUsername = $_POST['data']['registerUsername'];
    $registerPassword = $_POST['data']['registerPassword'];
    $registerCPassword = $_POST['data']['registerCPassword'];

    //Email
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$registerEmail)) {
        $errors['errorEmail'] = "Enter valid Email";
    }
    //Username
    if (strlen($registerUsername) < 1) {
        $errors['errorUsername'] = "Enter a username";
    }
    //password
    if (strlen($registerPassword) > 12) {
        $errors['errorPassword'] = "Maximum 12 Digits" ;
    }
    if (strlen($registerPassword) < 1) {
        $errors['errorPassword'] = "Enter a password" ;
    }
    //confirm password
    if($registerCPassword!=$registerPassword)
    {
        $errors['errorCPassword'] = "Values should match";
    }
    if(count($errors)>0){
        echo json_encode(['status'=>false, 'errors'=> $errors]);
    }
    else{
        try {
            $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
            // make a database connection
            $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            //prepare stmts
            $statement = $pdo->prepare("select * from users where email =?");
    $statement->execute([$_POST['data']['registerEmail']]);
    $statement = $pdo->prepare("select * from users where username =?");
    $statement->execute([$_POST['data']['registerUsername']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        //check in database if email exists
    if (count($resultSet) != 0) {
        echo json_encode(['status'=>false, 'message'=>'Username and Email exists.']);
        return;
    }
    //if new user then insert in database
    $statement = $pdo->prepare("Insert into users (email,username,password) values (?,?,?)");
    $queryResult = $statement->execute([$_POST['data']['registerEmail'],$_POST['data']['registerUsername'],md5($_POST['data']['registerPassword'])]);
    if($queryResult){
        echo json_encode(['status'=>true, 'message'=>'User registered successfully!']);
        return;
    }
   
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}
    }
}
?>