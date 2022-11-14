<?php
include_once "errors.php";
include_once "./../classes/response.php";
include_once "./../classes/ifscCode.php";
include_once "./../classes/validationErrors.php";

// Parameters from the post
$parameters = [
	"partyAccNum" => "Party Account Number",
	"conPartyAccNum" => "Confirm Party Account Number",
	"partyName" => "Party Name",
	"IFSCCode" => "IFSC Code",
	"headOfAccount" => "Head of Account",
	"expenditureType" => "Expenditure Type",
	"purposeType" => "Purpose Type",
	"purpose" => "Purpose",
	"partyAmount" => "Party Amount"
];

// Creating a new validation errors class
$parameterErrors = new ValidationErrors();

// checkk if we got all parameters required to validate
foreach ($parameters as $element => $elementValue) {

	// Checking element if isset
	if (!isset($_POST[$element])) {
		// If not set pushing error
		$parameterErrors->pushError("notFoundErrors", $elementValue);
	}
}

// If you have errors sending reponse as errors
if (count($parameterErrors->getErrors()) > 0) {
	$reponseObj = new Response();
	echo $reponseObj->setResponse(false, "Parametrs Not Found", $parameterErrors->getErrors())->getResponse();
	exit;
}

// Getting data in variables
$partyAccNum = $_POST['partyAccNum'];
$conPartyAccNum = $_POST['conPartyAccNum'];
$partyName = $_POST['partyName'];
$IFSCCode = $_POST['IFSCCode'];
$headOfAccount = $_POST['headOfAccount'];
$expenditureType = $_POST['expenditureType'];
$purposeType = $_POST['purposeType'];
$purpose = $_POST['purpose'];
$partyAmount = $_POST['partyAmount'];

// Errors array
$errors = new ValidationErrors();

// Validating partyAccNum
if (strlen($partyAccNum) < 12 || strlen($partyAccNum) > 22) {
	$errors->pushError("partyAccNum", PARTY_ACCOUNT_NUMBER_LENGTH_ERROR);
}
if (!ctype_digit($partyAccNum)) {
	$errors->pushError("partyAccNum", PARTY_ACCOUNT_NUMBER_NUMBERS_ONLY_ERROR);
}

// Confirm party account number validation
if ($partyAccNum != $conPartyAccNum) {
	$errors->pushError("conPartyAccNum", PARTY_ACCOUNT_NUMBERS_NOT_MATCHED_ERROR);
}

// Party Name Validation
if (preg_match('[@_!#$%^&*()<>?/|}{~:]', $partyName)) {
	$errors->pushError("partyName", PARTY_NAME_SPECIAL_CHARS_ERROR);
}
if (strlen($partyName) == 0) {
	$errors->pushError("partyName", PARTY_NAME_NULL_ERROR);
}

// // IFSC Code Validation
$ifscCodeObj = new Ifsc($IFSCCode);
$statusOfIfscCodeCheck = $ifscCodeObj->getIfscCode();
if ($statusOfIfscCodeCheck == false) {
	$errors->pushError("ifscErrorDiv", IFSC_CODE_NOT_VALID);
}

// Head of account validation
if ($headOfAccount == "") {
	$errors->pushError("headOfAccount", HOD_NOT_SELECTED_ERROR);
}

// Purpose Type validation
if ($purposeType == "") {
	$errors->pushError("purposeType", PURPOSE_TYPE_NOT_SELECTED_ERROR);
}

// Expenditure Type Validation
if ($expenditureType == "") {
	$errors->pushError("expenditureType", EXPENDITURE_NOT_SELECTED_ERROR);
}

// Purpose Validation
if (strlen($purpose) == 0) {
	$errors->pushError("purpose", PURPOSE_NULL_ERROR);
}
if (strlen($purpose) > 500) {
	$errors->pushError("purpose", PURPOSE_LENGTH_ERROR);
}

// Party Amount validation
if (strlen($partyAmount) == 0) {
	$errors->pushError("partyAmount", PARTY_AMOUNT_NULL_ERROR);
}

// Getting errors count
if (count($errors->getErrors()) > 0) {
	$errors->pushError("mainErrors", "Please check the errors!");
	$errors = $errors->getErrors();

	// If errors exist encoding errors as json
	$errorsJSON =  json_encode($errors);

	// Setting reponse json
	$responseObj = new Response();
	echo $responseObj->setResponse(false, "Errors found!", $errors)->getResponse();
	exit;
} else {

	// Sending true as reponse if no errors exist
	$responseObj = new Response();
	echo $responseObj->setResponse(true, "Form Submitted without any errors!")->getResponse();
	exit;
}
