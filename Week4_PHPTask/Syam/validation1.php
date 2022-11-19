<?php

$errorsArray = [];

if(array_key_exists('partyAccount',$_POST)){
   $partyAccount = $_POST["partyAccount"];
    //echo json_encode($errors);
  //  return;


if(strlen($partyAccount) == "0"){
    array_push($errorsArray, "Please Enter Party Account Number");
     
     }
 if(strlen($partyAccount )<12 || strlen($partyAccount )>22){
    array_push($errorsArray, "Party Account Number Contains Atleast 12 Digits");

}
 if(!preg_match("/[0-9]/",$partyAccount)){
    array_push($errorsArray, "Party Account Name should not contains characters");
   // echo json_encode($errors);
    // return;
 }
}else{
   array_push($errorsArray,"Please Enter Party Account Number");
}


 if(array_key_exists('confirmPartyAccount',$_POST)){
   $confirmPartyAccount = $_POST["confirmPartyAccount"];
    
   // echo json_encode($errors);
   // return;
 if($partyAccount != $confirmPartyAccount){
    array_push($errorsArray, "Confirm Party Account Number and Party Account Number should be same");
}
 }else{
   array_push($errorsArray, "Please Enter Confirm Party Account Number");
 }

 if(array_key_exists('partyName',$_POST)){
   $partyName = $_POST["partyName"];
    
    //echo json_encode($errors);
    // return;
 if(strlen($partyName) == "0"){
    array_push($errorsArray, "Party Name is required");
}
 if (!preg_match("/[a-zA-Z]/", $partyName)) {
    array_push($errorsArray, "Party Name should not have Spaces and Special Characters");
 }
}else{
   array_push($errorsArray, "Please Enter Party Name");
}
if(array_key_exists('ifscCode',$_POST)){
   $ifscCode = $_POST["ifscCode"];
   // return;


if(strlen($ifscCode) != 11){
    array_push($errorsArray, "Ifsc Code should contains 11 digits");
     //return;
}
if(!preg_match("/[A-Z]{4}[0][0-9A-Za-z]{6}/",$ifscCode)){
    array_push($errorsArray, "Enter Ifsc Code in valid format");
//return;
 }
}else{
   array_push($errorsArray, "Please Enter Ifsc Code in valid format");
}
 if(array_key_exists('purpose',$_POST)){
   $purpose = $_POST["purpose"]; 
   
    //echo json_encode($errors);
    //return;
 if(strlen($purpose) =="0"){
    array_push($errorsArray, "Purpose is required");
 }
 if(strlen($purpose) > 500){
    array_push($errorsArray,"Purpose is lessthan 500 characters");
}
 }else{
   array_push($errorsArray, "Please Enter Purpose");
 }
//print_r($errorsArray);
echo json_encode($errorsArray);


// date_default_timezone_set('Asia/Kolkata');
// $Date = date( 'd-m-Y h:i:s A', time () );
// echo $Date;



?>