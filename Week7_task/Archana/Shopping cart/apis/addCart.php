<?php
session_start();
include './db.php';
$response = [
    'status' => false,
    'message' =>"",
    'data' =>[]
];
if(!array_key_exists('product',$_POST)){
	$response['status']=false;
	$response['message']="enter a Product";
	echo json_encode($response);
	return $response;
}
if(!array_key_exists('id',$_POST)){
	$response['status']=false;
	$response['message']="enter a id";
	echo json_encode($response);
	return $response;
}
$statement = $pdo->prepare("insert into cart(buyerid,productname) values (?,?)");
$statement->execute([$_POST['id'], $_POST['product']]);
$resultset =$statement->fetch(PDO::FETCH_ASSOC);
$response['status'] = true;
$response['message'] = "Added To Cart";
$response['data'] = $resultset;
echo json_encode($response); 
return;