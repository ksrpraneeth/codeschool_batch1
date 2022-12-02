<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
if(isset($_POST['selectTheatres']))
{
    $statement = $pdo->prepare("select id,from_time,to_time from shows where theatre_branch_id=?");
    
    $statement->execute([$_POST['selectTheatres']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
        }
?>