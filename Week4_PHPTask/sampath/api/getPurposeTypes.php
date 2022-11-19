<?php
include_once "./../classes/response.php";

// Checking if id is set
if(!isset($_POST['id'])){

	// if expenditureType is not set sending error reponse
	$reponseObj = new Response();
	echo $reponseObj->setResponse(false, "Expenditure id was missing!")->getResponse();
	exit;
}

// Getting id
$id = $_POST['id'];

// Reading json file
$json = file_get_contents('./../expenditureType.json');

// Decoding json data
$jsonData = json_decode($json, true);

// Getting reponse types from data
foreach($jsonData as $expenditure){

	// If found with same id sending reponse types and exiting
	if($expenditure['id'] == $id){
		$reponseObj = new Response();
		echo $reponseObj->setResponse(true, null, $expenditure['purposeTypes'])->getResponse();
		exit;
	}
}
