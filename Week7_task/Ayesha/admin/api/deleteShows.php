<?php
include "./../db.php";
session_start();
$show_id = $_POST['show_id'];
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Connected to the $db database successfully!";
    // prepare statements
    $statement = $pdo->prepare("DELETE from shows where id=?");
    $statement->execute([$_POST['show_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['status'=>true, 'message'=>'Show deleted successfully!']);
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}