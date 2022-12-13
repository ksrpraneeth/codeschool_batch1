<?php
include "./../db.php";
session_start();
$seat_id = $_POST['seat_id'];
$seat_id = $_POST['booking_id'];
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Connected to the $db database successfully!";
    // prepare statements
    $statement = $pdo->prepare("DELETE from seat_booking where bookings_id=?");
    $statement->execute([$_POST['booking_id']]);
    $statement = $pdo->prepare("DELETE from bookings where id=?");
    $statement->execute([$_POST['booking_id']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}