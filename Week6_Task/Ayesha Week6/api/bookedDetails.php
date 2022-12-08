<?php
include "./../db.php";
$token= $_POST['token']; 
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Connected to the $db database successfully!";
    // prepare statements
    $statement = $pdo->prepare('select id from users where token =?');
    $statement->execute([$_POST['token']]);
    $resultSetToken = $statement->fetch(PDO::FETCH_ASSOC);
    if($resultSetToken == false){
        echo json_encode(["status"=>false, "message"=>"Token not found!"]);
    }
    $userId = $resultSetToken["id"];
    $statement = $pdo->prepare("SELECT b.id, m.movie_name,t.address,STRING_AGG(sb.seats_id::CHARACTER VARYING, ' , ')
    FROM bookings b, movies m, seat_booking sb,shows s,theatre_branch t
    WHERE b.movie_id = m.id AND b.id=sb.bookings_id AND s.movie_id=m.id AND t.id=b.theatre_branch_id AND t.id=s.theatre_branch_id AND b.users_id =?
    GROUP BY b.id, m.movie_name,s.from_time,t.address");
    $statement->execute([$userId]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    if ($pdo) {
        $pdo = null;
    }
}
