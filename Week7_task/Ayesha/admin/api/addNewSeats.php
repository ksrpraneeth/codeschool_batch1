<?php
include "./../db.php";
session_start();
$showList = $_POST['showList'];
$addSeat = $_POST['addSeat'];
$errors = [];
//check for validations
if($showList == "")
{
    array_push($errors,"Please select a show.");
}
if($addSeat == "")
{
    array_push($errors,"Please enter a seat type.");
}
if(count($errors)>0){
    echo json_encode(['status'=>false, 'errors'=> $errors]);
    return;
}
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Connected to the $db database successfully!";
    // insert stmts for seat
    $statement = $pdo->prepare("Insert into seats(shows_id,seat_type) values (?,?)");
    $queryResult = $statement->execute(([$_POST['showList'],$_POST['addSeat']]));
    if($queryResult){
        echo json_encode(['status'=>true, 'message'=>'Seat added.']);
        return;
        }
  

   
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}