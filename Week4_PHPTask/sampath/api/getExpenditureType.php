<?php
include_once "./../classes/response.php";

$json = file_get_contents('./../expenditureType.json');
// Decoding json data
$jsonData = json_decode($json, true);

// Creating the reponse object
$data = [];

// Getting hoa from data
foreach($jsonData as $expenditure){
	$data[] = array("id" => $expenditure['id'], "expenditure" => $expenditure["expenditure"]);
}

// Sending reposne
$responseObj =  new Response();
echo $responseObj->setResponse(true,"Success",$data)->getResponse();

?>
