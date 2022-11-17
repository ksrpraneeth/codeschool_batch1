<?php 

if (!array_key_exists("bankIFSCCode", $_POST))
{
    echo "Invalid";
    return;
}
// echo $_SERVER['REQUEST_METHOD'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){  
  
    $bankIFSCCode = $_POST['bankIFSCCode'];
  }
  

$ifscCodeara = [
    "SBIN0123123" => [
        "bankName" => "Kotak Mahindra Bank",
        "bankBranch" => "Hyderabad"
    ],
    $arrayIfsc=[
 "KKBK0123123" => [
        "bankName" => "Kotak",
        "bankBranch" => "Hyderabad"
    ],
    "ICIC0123123" => [
        "bankName" => "ICIC",
        "bankBranch" => "Hyderabad"
    ],
    "UNIN0123123" => [
        "bankName" => "Union",
        "bankBranch" => "Hyderabad"
    ]
   ,
    
]];

if (preg_match("/[A-Z]{4}[0][0-9]{6}/", $bankIFSCCode) && array_key_exists($bankIFSCCode,$arrayIfsc) ){
    echo json_encode($arrayIfsc[$bankIFSCCode]);
}
else {
    $errormessage = ["errormessage" => "Invalid IFSC CODE", ]
 ;
    echo  json_encode( $errormessage );
    
}






?>