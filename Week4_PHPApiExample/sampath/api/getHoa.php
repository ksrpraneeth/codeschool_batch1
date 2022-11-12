<?php
include_once "./../classes/response.php";
include_once "./../data/hoa.php";

// Getting keys of HOA
$hoaList = array_keys(HOA);

// Sending it to frontend
$responseObj = new Response();
echo $responseObj->setResponse(true, "success", $hoaList)->getResponse();
?>
