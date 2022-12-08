<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
if(isset($_POST['selectMovies']))
{
    $statement = $pdo->prepare("
        select * from theatre_branch 
        where exists (
            select 1 from shows 
            where 
                shows.theatre_branch_id=theatre_branch.id 
                and shows.movie_id=?)
    ");
    
    $statement->execute([$_POST['selectMovies']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
        }
?>