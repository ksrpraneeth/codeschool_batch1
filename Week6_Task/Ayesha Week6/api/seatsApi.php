<?php
include "./../db.php";
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
// make a database connection
$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// prepare statements
if(isset($_POST['selectShow']))
{
    $statement = $pdo->prepare("select * from seats where shows_id=?");
    $statement->execute([$_POST['selectShow']]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode(['status' => true, 'data' => $resultSet]);
    return;
        }
?>