<?php
include_once "./../classes/response.php";
// Creating a new response object
$reponseObj = new Response();

$ones = [
	"one",
	"two",
	"three",
	"four",
	"five",
	"six",
	"seven",
	"eight",
	"nine",
	"ten",
	"eleven",
	"twelve",
	"thirteen",
	"fourteen",
	"fifteen",
	"sixteen",
	"seventeen",
	"eighteen",
	"nineteen",
];

$tens = [
	"twenty",
	"thirty",
	"fourty",
	"fivety",
	"sixty",
	"seventy",
	"eighty",
	"ninty"
];

$postFixes = ["hundred", "thousand", "lakh", "crore"];

// checking if number exists in post
if (isset($_POST['number'])) {

	// if exists getting it into variable
	$number = $_POST['number'];

	// checking if it is empty sending data
	if ($number == "") {
		die($reponseObj->setResponse(false, "Please check the number given")->getResponse());
	}

	// if it is not number
	if (!ctype_digit($number)) {
		die($reponseObj->setResponse(false, "Only numbers are accepted!")->getResponse());
	}

	// If number is zero sending zero
	if ($number == 0) {
		die($reponseObj->setResponse(true, "success", "zero")->getResponse());
	}

	// if number is less than 20 sending from array
	if ($number < 20) {
		die($reponseObj->setResponse(true, "success", $ones[$number - 1])->getResponse());
	} else {
		// Getting number length
		$numberLength = strlen((string) $number);

		// Initializing return text
		$text = "";

		// Looping through digits from backwards
		for ($i = $numberLength - 1; $i >= 0; $i--) {

			// Getting present digit
			$digit = (int) ((string) $number)[$i];

			// Getting next digit
			$digitAfter = -1;
			if ($i - 1 >= 0) {
				$digitAfter = (int) (((string) $number)[$i - 1]);
			}

			// Reverse Index
			$reverseIndex = $numberLength - $i - 1;

			// Going through serverIndex
			switch ($reverseIndex) {
				// Getting digit
				case 0:
					$result = getOnes($digit, $digitAfter);
					if($result["status"] === true){
						$text = $result["text"];
						$result["added"] == true? $i--: null;
					}
					break;
				case 1:
					if ($digit == 0) {
						break;
					}
					$text = $tens[$digit - 2] . " " . $text;
					break;
				case 2:
					if ($digit == 0) {
						break;
					}
					if ($text == "") {
						$text = $ones[$digit - 1] . " " . $postFixes[0] . $text;
					} else {
						$text = $ones[$digit - 1] . " " . $postFixes[0] . " and " . $text;
					}
					break;
				default:
					if($reverseIndex%2 == 0){
						$result = getTens($digit);
						if($result == false){
							break;
						}
						$text = $result . " " . $text;
					} else {
						$tempIndex = $reverseIndex;
						while($reverseIndex > 8){
							$reverseIndex = $reverseIndex - 8;
						}
						$result = getOnes($digit, $digitAfter);
						if($result["status"] == true){
							if($tempIndex > 8){
								if(strlen($text) == 0){
									while($tempIndex > 8){
										$text .= " crore";
										$tempIndex = $tempIndex - 4;
									}
								}
							}
							$text = $result["text"] ." " . $postFixes[$reverseIndex/2] . " " . $text;
							$result["added"] == true? $i--: null;
						}
					}
			}
		}
		die($reponseObj->setResponse(true, "success", $text)->getResponse());
	}
} else {
	die($responseObj->setResponse(false, "Number was not provided")->getResponse());
}

function getOnes($one, $ten){
	global $tens, $ones;
	$text = "";
	$added = false;
	if ($ten == 1) {
		$text .= $ones[(10 + $one) - 1];
		$added = true;
	} else {
		if ($one == 0) {
			if ($ten == 0 || $ten == -1) {
				return array("status" => false, $text => "");
			}
			$text .= $tens[$ten - 2];
			$added = true;
		} else {
			$text .= $ones[$one - 1] ;
		}
	}
	return array("status" => true, "text" => $text, "added" => $added);

}

function getTens($digit){
	global $tens;
	if ($digit == 0) {
		return false;
	}
	return $tens[$digit - 2];
}
