<?php
include "./../classes/response.php";
$json = file_get_contents('./../hoa.json');

// Decoding json data
$jsonData = json_decode($json, true);

// Creating the reponse object
$data = [];

// Getting hoa from data
foreach($jsonData["accounts"] as $hoa){
	$data[] = array("id" => $hoa['id'], "hoa" => $hoa["hoa"]);
}

// Sending reposne
$reponseObj = new Response();
echo $reponseObj->setResponse(true, null, $data)->getResponse();

?>
