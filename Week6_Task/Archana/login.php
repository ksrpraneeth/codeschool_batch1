<?php
include './db.php';
$response = [
    'status' => false,
    'message' =>"",
    'data' =>[]
];
if(!array_key_exists('Username',$_POST)){
	$response['ststus']=false;
	$response['message']="enter a valid Username";
	echo json_encode($response);
	return $response;
}
if(!array_key_exists('password',$_POST)){
	$response['ststus']=false;
	$response['message']="enter a valid password";
	echo json_encode($response);
	return $response;
}
$statement = $pdo->prepare("select * from username where username = ? and password = ?");
$statement->execute([$_POST['Username'], $_POST['password']]);
$resultset =$statement->fetch(PDO::FETCH_ASSOC);
if(!$resultset) {
	$response['status'] = false;
	$response['message']="Username and password incorrect";
	echo json_encode($response); return;
}
$response['status'] = true;
$response['message'] = "successfully login";
$response['data'] = $resultset;
echo json_encode($response);
return;
