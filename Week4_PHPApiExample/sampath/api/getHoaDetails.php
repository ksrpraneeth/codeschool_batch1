<?php
include_once "./../classes/response.php";

if(!isset($_POST['id'])){
	$reponseObj = new Response();
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

// Getting json file
$json = file_get_contents('./../hoa.json');

// Decoding json data
$jsonData = json_decode($json, true);

// getting details and sending the reponse object
forEach($jsonData["accounts"] as $hoa){
	if($hoa["id"] == $id){
		$reponseObj = new response();
		$reponseObj->setResponse(true, "Success!", array("balance" => $hoa["balance"], "loc" => $hoa["loc"]));
		echo $reponseObj->getResponse();
		exit;
	}
}

// if not found
$reponseObj = new response();
$reponseObj->setResponse(false, "HOA Not found");
echo $reponseObj->getResponse();
exit;

?>
