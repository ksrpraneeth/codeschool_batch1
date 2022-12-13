<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
    $statement = $pdo->prepare("select shows.id show_id,movies.movie_name,shows.movie_id,movies.id,shows.from_time,shows.to_time,shows.date,theatre_branch.address,shows.theatre_branch_id,theatre_branch.id
    from movies,shows,theatre_branch
    where shows.movie_id=movies.id and
    theatre_branch.id=shows.theatre_branch_id
     order by movie_id");
    $statement->execute();
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
?>