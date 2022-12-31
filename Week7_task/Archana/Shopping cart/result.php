<?php
include 'header.php';
include 'order.php';
$statement = $pdo->prepare("select * from Address where referencekeybuyerid = ?");
$statement->execute([$_SESSION['Buyerid']]);
$resultset =$statement->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['Addressdet'] = $resultset;
$response['data'] = $resultset;
echo json_encode($response); return;
?>