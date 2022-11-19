<?php

$errorsArray = [];

if(array_key_exists('partyAccount',$_POST)){
   $partyAccount = $_POST["partyAccount"];
    //echo json_encode($errors);
  //  return;


if(strlen($partyAccount) == "0"){
    array_push($errorsArray, "Account Number is required");
     
     }
 if(strlen($partyAccount )<12 || strlen($partyAccount )>22){
    array_push($errorsArray, "Account Number contains atleast 12digits");

}
 if(!preg_match("/[0-9]/",$partyAccount)){
    array_push($errorsArray, "partyAccount Name should not contains characters");
   // echo json_encode($errors);
    // return;
 }
}else{
   array_push($errorsArray,"plase enter partyAccount Number");
}


 if(array_key_exists('confirmPartyAccount',$_POST)){
   $confirmPartyAccount = $_POST["confirmPartyAccount"];
    
   // echo json_encode($errors);
   // return;
 if($partyAccount != $confirmPartyAccount){
    array_push($errorsArray, "Account Number and Party Account Number should be same");
}
 }else{
   array_push($errorsArray, "plase enter confirmpartyAccount Number");
 }

 if(array_key_exists('partyName',$_POST)){
   $partyName = $_POST["partyName"];
    
    //echo json_encode($errors);
    // return;
 if(strlen($partyName) == "0"){
    array_push($errorsArray, "partyName is required");
}
 if (!preg_match("/[a-zA-Z]/", $partyName)) {
    array_push($errorsArray, "Party Name should not have Spaces and Special Characters");
 }
}else{
   array_push($errorsArray, "plase enter partyName");
}
if(array_key_exists('ifscCode',$_POST)){
   $ifscCode = $_POST["ifscCode"];
   // return;


if(strlen($ifscCode) != 11){
    array_push($errorsArray, "ifscCode should contains 11 digits");
     //return;
}
if(!preg_match("/[A-Z]{4}[0][0-9A-Za-z]{6}/",$ifscCode)){
    array_push($errorsArray, "Enter ifscCode in valid format");
//return;
 }
}else{
   array_push($errorsArray, "Please Enter ifscCode in valid format");
}
 if(array_key_exists('purpose',$_POST)){
   $purpose = $_POST["purpose"]; 
   
    //echo json_encode($errors);
    //return;
 if(strlen($purpose) =="0"){
    array_push($errorsArray, "purpose is required");
 }
 if(strlen($purpose) > 500){
    array_push($errorsArray,"purpose is lessthan 500 characters");
}
 }else{
   array_push($errorsArray, "plase enter purpose");
 }
//print_r($errorsArray);
echo json_encode($errorsArray);


// date_default_timezone_set('Asia/Kolkata');
// $Date = date( 'd-m-Y h:i:s A', time () );
// echo $Date;



?>