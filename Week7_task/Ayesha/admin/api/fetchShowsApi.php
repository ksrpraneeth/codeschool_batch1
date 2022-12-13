<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
    $statement = $pdo->prepare("
    SELECT s.id,s.date,s.from_time,t.address,m.movie_name from
    shows s,movies m,theatre_branch t where
    s.movie_id=m.id and
    s.theatre_branch_id=t.id");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
?>