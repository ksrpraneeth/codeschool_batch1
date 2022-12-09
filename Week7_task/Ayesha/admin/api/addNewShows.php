<?php
include "./../db.php";
session_start();
$addDate = $_POST['addDate'];
$addFromTime = $_POST['addFromTime'];
$addToTime = $_POST['addToTime'];
$movieList = $_POST['movieList'];
$addTheatre= $_POST['addTheatre'];
$errors = [];
//check for validations
if($addTheatre == "")
{
    array_push($errors,"Please select a theatre to host your show.");
}
if($movieList == "")
{
    array_push($errors,"Please select a movie.");
}
if($addDate == "")
{
    array_push($errors,"Please enter a date in yyyy-mm-dd format.");
}
if($addFromTime == "")
{
    array_push($errors,"Please enter the Show start-time in hrs:min:sec format.");
}
if($addToTime == "")
{
    array_push($errors,"Please enter the Show end-time in hrs:min:sec format.");
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
    $statement = $pdo->prepare("select * from shows where date =? and from_time=? and to_time=?");
    $statement->execute([$_POST['addDate'],$_POST['addFromTime'],$_POST['addToTime']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        //check in database if show exits
    if (count($resultSet) != 0) {
        echo json_encode(['status'=>false, 'message'=>'Movie playing on the particular slot.']);
        return;
    }
    // insert stmts for shows
    $statement = $pdo->prepare("Insert into shows(theatre_branch_id,date,from_time,to_time,movie_id) values (?,?,?,?,?)");
    $queryResult = $statement->execute(([$_POST['addTheatre'],$_POST['addDate'],$_POST['addFromTime'],$_POST['addToTime'],$_POST['movieList']]));
    if($queryResult){
        echo json_encode(['status'=>true, 'message'=>'New Show added.']);
        return;
    }

   
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}