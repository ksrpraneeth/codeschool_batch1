<?php
 $resultArray = [

 
];
 if (!array_key_exists("bankifsccode", $_POST)) {

array_push($resultArray,  "Please enter ifsccode");

 }
 $bankifsccode = $_POST['bankifsccode'];

 if (!preg_match("/[A-Z]{4}[0][0-9]{6}/", $bankifsccode)) {
 //array_push($resultArray, "ifsccode should be 11digits");
    $resultArray = [
            "Errors" => "Invalid code",
            "bankName" => "",
            "bankbranch" => ""];
        }
 if (preg_match("/[A-Z]{4}[0][0-9]{6}/", $bankifsccode)) {
 //array_push($resultArray, "ifsccode should be 11digits");
    $resultArray = [
            "Errors" => "",
            "bankName" => "icici",
            "bankbranch" => "bengalore"];
        }
 if (preg_match("/[a-z]{4}[0][0-9]{6}/", $bankifsccode)) {
 //array_push($resultArray, "ifsccode should be 11digits");
    $resultArray = [
            "Errors" => "",
            "bankName" => "SBI",
            "bankbranch" => "bengalore"];
        }
     echo json_encode($resultArray);
 ?>