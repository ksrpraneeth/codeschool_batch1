<?php
class Ifsc
{
	public $ifscCode;

	function __construct($ifscCode)
	{
		$this->ifscCode = $ifscCode;
	}


	// Function to check ifsc code
	function checkIfscCode()
	{
		$ifsc = $this->ifscCode;
		if (strlen($ifsc) != 11) {
			return false;
		} else {
			if ($ifsc[4] != "0") {
				return false;
			} else {
				if (ctype_upper(substr($ifsc, 0, 5))) {
					return false;
				} else {
					return true;
				}
			}
		}
	}

	// Getting IFSC Code
	function getIfscCode()
	{
		$ifsc = $this->ifscCode;
		if ($this->checkIfscCode() === true) {

			// Initing the curl
			$curl = curl_init();

			// Setting url and input
			$url = 'https://ifsc.razorpay.com/' . $ifsc;
			curl_setopt($curl, CURLOPT_URL, $url);

			// Getting data in variable instead of echo it
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			// Getting result
			$result = curl_exec($curl);

			// Closing curl
			curl_close($curl);

			// Checking if result occurs
			if (!$result) {
				return false;
			} else {
				$result = json_decode($result, true);
				if ($result === "Not Found") {
					return false;
				} else {
					return array("name" => $result['BANK'], "branch" => $result['BRANCH']);
				}
			}
		} else {
			return false;
		}
	}
}
