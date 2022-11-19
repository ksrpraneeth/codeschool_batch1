<?php

    if(!(isset($_POST['partyAccountNumber']) && isset($_POST['confirmPartyAccountNumber']) && isset($_POST['partyName']) && isset($_POST['bankIFSCCode']) && isset($_POST['purpose']) && isset($_POST['partyAmount']))){
        echo "Key not found";
        return;
    }
    $partyAccountNumber = $_POST['partyAccountNumber'];
    $confirmPartyAccountNumber = $_POST['confirmPartyAccountNumber'];
    $partyName = $_POST['partyName'];
    $purpose = $_POST['purpose'];
    $partyAmount = $_POST['partyAmount'];   
    $bankIFSCCode = $_POST['bankIFSCCode'];   
    $errorArray=['partyAccountNumberErr'=>[],
                'confirmPartyAccountNumberErr'=>[],
                'partyNameErr'=>[],
                'purposeErr'=>[],
                'partyAmountErr'=>[],
                'bankIFSCCodeErr'=>[]
                ];
   
    
    if(strlen($partyAccountNumber) >22 || strlen($partyAccountNumber) <12 ){
        $errorArray['partyAccountNumberErr']="Enter Valid Party Account Number (min 12 and Max 22 characters)";
    }
    if(strlen($confirmPartyAccountNumber) == 0){
        $errorArray['confirmPartyAccountNumberErr']= "Enter Confirm Party Account Number";
    }
    if($partyAccountNumber != $confirmPartyAccountNumber){
        $errorArray['confirmPartyAccountNumberErr']="Party Account Number and Confirm Party Account Number shuld be same";
    }
    if(strlen($partyName) == 0){
        $errorArray['partyNameErr']="Enter Party Name";
    }
    if(strlen($purpose) == 0){
        $errorArray['purposeErr']="Enter Purpose";
    }
    if(strlen($partyAmount) == 0){
        $errorArray['partyAmountErr']="Enter Party Amount";
    }
    if(preg_match("/[^a-zA-Z0-9]/",$partyName)){
        $errorArray['partyNameErr']="Party Name should not have special characters";
    }
    if(strlen($bankIFSCCode)==0){
        $errorArray['bankIFSCCodeErr']= "Enter Bank IFSC Code";
    }
    echo json_encode($errorArray);

?>