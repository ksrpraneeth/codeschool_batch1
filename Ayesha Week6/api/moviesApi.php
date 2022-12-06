<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
    $statement = $pdo->prepare("select id, movie_name from movies");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
?>
