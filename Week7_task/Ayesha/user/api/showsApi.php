<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
if(isset($_POST['selectTheatres']))
if(isset($_POST['selectMovies']))
{
    $statement = $pdo->prepare("select id,from_time,to_time,date from shows where theatre_branch_id=? and movie_id=?");
    $statement->execute([$_POST['selectTheatres'],$_POST['selectMovies']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
        }
?>