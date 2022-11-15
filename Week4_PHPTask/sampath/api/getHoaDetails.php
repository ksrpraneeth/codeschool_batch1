<?php
include_once "./../classes/response.php";
include_once "./../data/hoa.php";
$reponseObj = new Response();

if(!isset($_POST['id'])){
	$reponseObj->setResponse(false, "Cannot find ID in API data!");
	echo $reponseObj->getResponse();
	exit;
}
// Getting id
$id = $_POST['id'];

if($id == ""){
	$reponseObj = new response();
	$reponseObj->setResponse(false, "Please select Head of account");
	echo $reponseObj->getResponse();
	exit;
}

// Getting hoa details from constant
$details = HOA[array_keys(HOA)[$id]];

echo $reponseObj->setResponse(true, "Success", $details)->getResponse();
?>
