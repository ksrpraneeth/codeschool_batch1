<?php
include_once "./../classes/ifscCode.php";
include_once "./../classes/response.php";
include_once "./errors.php";


if (!isset($_POST['ifscCode'])) {

	// Sending if error if not exist
	$responseObj = new response();
	echo $responseObj->setResponse(false, IFSC_CODE_NOT_VALID)->getResponse();
	exit;
}
$ifscCodeobj = new Ifsc($_POST['ifscCode']);
$ifscCodeStatus = $ifscCodeobj->getIfscCode();
if ($ifscCodeStatus === false) {
	echo json_encode(array("status" => false, "error" => IFSC_CODE_NOT_VALID));
} else {
	echo json_encode(array("status" => true, "bankDetails" => $ifscCodeStatus));
}
