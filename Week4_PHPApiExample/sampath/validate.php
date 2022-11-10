<?php
include_once "errors.php";

if (isset($_POST['type'])) {
    switch ($_POST['type']) {

            // Validating data
        case "VALIDATE": {
                // Checking all data has been sent
                if (
                    !isset($_POST['partyAccNum']) ||
                    !isset($_POST['conPartyAccNum']) ||
                    !isset($_POST['partyName']) ||
                    !isset($_POST['IFSCCode']) ||
                    !isset($_POST['bankName']) ||
                    !isset($_POST['bankBranch']) ||
                    !isset($_POST['headOfAccount']) ||
                    !isset($_POST['balance']) ||
                    !isset($_POST['loc']) ||
                    !isset($_POST['expenditureType']) ||
                    !isset($_POST['purpose']) ||
                    !isset($_POST['partyAmount'])
                ) {
                    // if not sending error
                    echo json_encode(array("status" => false, "error" => $variableNotExist));
                    return;
                }

                // Getting all the details
                $partyAccNum = $_POST['partyAccNum'];
                $conPartyAccNum = $_POST['conPartyAccNum'];
                $partyName = $_POST['partyName'];
                $IFSCCode = $_POST['IFSCCode'];
                $bankName = $_POST['bankName'];
                $bankBranch = $_POST['bankBranch'];
                $headOfAccount = $_POST['headOfAccount'];
                $balance = $_POST['balance'];
                $loc = $_POST['loc'];
                $expenditureType = $_POST['expenditureType'];
                $purpose = $_POST['purpose'];
                $partyAmount = $_POST['partyAmount'];

                // Errors array
                $errors = [];

                // Validating partyAccNum
                if (strlen($partyAccNum) < 12 || strlen($partyAccNum) > 22) {
                    $errors[] = "Party Account number must be between 12 and 22 characters long";
                }
                if (ctype_digit($partyAccNum)) {
                    $errors[] = "Party Account number must be numbers";
                }

                // Confirm party account number validation
                if ($partyAccNum != $conPartyAccNum) {
                    $errors[] = "Party Account numbers should be same";
                }

                // Party Name Validation
                if (preg_match('[@_!#$%^&*()<>?/|}{~:]', $partyName)) {
                    $errors[] = "Party Name shouldn't have special characters";
                }
                if (strlen($partyName) == 0) {
                    $errors[] = "Party Name shouldn't be empty";
                }

                // // IFSC Code Validation
                $statusOfIfscCodeCheck = checkIfscCode($IFSCCode);
                if ($statusOfIfscCodeCheck !== true) {
                    $errors[] = $statusOfIfscCodeCheck;
                }

                // Head of account validation
                if ($headOfAccount == "-1") {
                    $errors[] = "Please select Head of Account";
                }

                // Expenditure Type Validation
                if ($expenditureType == "-1") {
                    $errors[] = "Please select Expenditure Type";
                }

                // Purpose Validation
                if (strlen($purpose) == 0) {
                    $errors[] = "Purpose is required";
                }
                if (strlen($purpose) > 500) {
                    $errors[] = "Purpose shouldn't be more than 500 characters";
                }

                // Party Amount validation
                if (strlen($partyAmount) == 0) {
                    $errors[] = "Party Amount is required";
                }

                // Getting errors count
                if (count($errors) > 0) {

                    // If errors exist encoding errors as json
                    $errorsJSON =  json_encode($errors);

                    // Setting reponse json
                    $responseJSON = json_encode(array("status" => false, "errors" => $errorsJSON));

                    // Sending json repsonse
                    echo $responseJSON;
                } else {

                    // Sending true as reponse if no errors exist
                    echo json_encode(array("status" => true));
                }
                break;
            }
        case "GETIFSCCODE": {
                // Checking if ifsc code exist in post
                if (!isset($_POST['ifscCode'])) {

                    // Sending if error if not exist
                    echo json_encode(array("status" => false, "error" => $variableNotExist));
                    return;
                }
                $ifscCodeStatus = getIfscCode($_POST['ifscCode']);
                if ($ifscCodeStatus === false) {
                    echo json_encode(array("status" => false, "error" => $ifscCodeNotValid));
                } else {
                    echo json_encode(array("status" => true, "bankDetails" => $ifscCodeStatus));
                }
                break;
            }
        case "GETHOA": {
                if (!isset($_POST['hoa'])) {
                    echo json_encode(array("status" => false, "error" =>  $variableNotExist));
                    return;
                }
                $hoa = $_POST['hoa'];
                $dataFromDatabase = array(
                    "0853001020002000000NVN" => array("balance" => "1000000", "loc" => "5000"),
                    "8342001170004001000NVN" => array("balance" => "1008340", "loc" => "4000"),
                    "2071011170004320000NVN" => array("balance" => "14530000", "loc" => "78000"),
                    "8342001170004002000NVN" => array("balance" => "1056400", "loc" => "34000"),
                    "2204000030006300303NVN" => array("balance" => "123465400", "loc" => "5000")
                );
                break;
            }
    }
} else {
    echo json_encode(array("status" => false, "error" => $typeNotExistError));
}

// Function to check ifsc code
function checkIfscCode($ifsc)
{
    if (strlen($ifsc) != 11) {
        return "IFSC Code should be 11 characters";
    } else {
        if ($ifsc[4] != "0") {
            return "IFSC Code should contain 0 at 5th character";
        } else {
            if (ctype_upper(substr($ifsc, 0, 5))) {
                return "IFSC Code first four letters should be alphabets";
            } else {
                return true;
            }
        }
    }
}

// Getting IFSC Code
function getIfscCode($ifsc)
{
    if (checkIfscCode($ifsc) === true) {

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
