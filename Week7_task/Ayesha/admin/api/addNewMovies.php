<?php
include "./../db.php";
session_start();
$addMovie = $_POST['addMovie'];
$addDirector = $_POST['addDirector'];
$errors = [];
//check for validations
if($addMovie == "")
{
    array_push($errors,"Please enter a movie");
}
if($addDirector == "")
{
    array_push($errors,"Please enter the director's name");
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
    $statement = $pdo->prepare("select * from movies where movie_name=?");
    $statement->execute([$_POST['addMovie']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
        //check in database if email exists
    if (count($resultSet) != 0) {
        echo json_encode(['status' => false, 'message' => 'Movie already added.']);
        return;
    }
    // insert stmts for movie
    $statement = $pdo->prepare("Insert into movies(movie_name,director) values (?,?)");
    $queryResult = $statement->execute(([$_POST['addMovie'],$_POST['addDirector']]));
    if($queryResult){
        echo json_encode(['status'=>true, 'message'=>'New movie added.']);
        return;
    }
}
catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}