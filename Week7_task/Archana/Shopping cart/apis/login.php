<?php
session_start();
include './db.php';
$response = [
    'status' => false,
    'message' =>"",
    'data' =>[]
];
if(!array_key_exists('username',$_POST)){
	$response['status']=false;
	$response['message']="enter a valid username";
	echo json_encode($response);
	return $response;
}
if(!array_key_exists('password',$_POST)){
	$response['status']=false;
	$response['message']="enter a valid password";
	echo json_encode($response);
	return $response;
}
$statement = $pdo->prepare("select * from Buyer where username = ? and password = ?");
$statement->execute([$_POST['username'], $_POST['password']]);
$resultset =$statement->fetch(PDO::FETCH_ASSOC);
if(!$resultset) {
	$response['status'] = false;
	$response['message']="username and password incorrect";
	echo json_encode($response); return;
}
$_SESSION['userdet'] = $resultset;
$_SESSION['Buyerid'] = $resultset['buyerid'];
$response['status'] = true;
$response['message'] = "successfully login";
$response['data'] = $resultset;
echo json_encode($response); return;