<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
    $statement = $pdo->prepare("SELECT sb.id,sb.seat_type,m.movie_name,t.address,s.date,s.from_time from
    movies m,theatre_branch t,shows s,seats sb where
    m.id=s.movie_id and 
    s.id=sb.shows_id and
    s.theatre_branch_id=t.id 
    order by sb.id");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
?>