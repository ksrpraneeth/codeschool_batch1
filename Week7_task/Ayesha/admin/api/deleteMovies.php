<?php
include "./../db.php";
session_start();
$movie_id = $_POST['movie_id'];
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Connected to the $db database successfully!";
    // prepare statements
    $statement = $pdo->prepare("DELETE from movies where id=?");
    $statement->execute([$_POST['movie_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}