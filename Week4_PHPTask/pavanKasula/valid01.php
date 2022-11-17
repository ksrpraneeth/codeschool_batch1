<?php
 


 if (!array_key_exists("partyAccountNum", $_POST) ||
  !array_key_exists("confirmPartyACnum", $_POST) || 
  !array_key_exists("partyName", $_POST) ||
  !array_key_exists("purpose", $_POST) 
  )  {
    echo "insuffient Data";
    return;
}
////////////\\\\\\\\\\\////////////\\\\\\\\\///////////

$partyAccountNum = $_POST['partyAccountNum'];   
$confirmPartyACnum = $_POST['confirmPartyACnum'];
$partyName = $_POST['partyName'];
$purpose = $_POST['purpose'];
 
 $errorsar=[];

if($partyAccountNum == ""){
     array_push($errorsar,"Please Enter Party Account Number");
    
}

if($confirmPartyACnum == ""){
    array_push($errorsar,("Please Enter Confirm Party Account Number"));
    
}

if(strlen($partyAccountNum) <=12 || strlen($partyAccountNum)>=24){
    array_push($errorsar,("Please Enter min 12 & max 24 Party Account number"));
}

if($partyAccountNum != $confirmPartyACnum ){
    array_push($errorsar,("Party AC num and Confirm AC num should be same"));
}

if($purpose == ""){
    array_push($errorsar,("Please Enter Purpose"));
    
}

if($partyName == ""){
    array_push($errorsar,("Please Enter PartyName"));
    
}
if (preg_match("/[^a-zA-Z0-9]/", $partyName)) {
    array_push($errorsar,("Party Name should not have Special Characters"));
    return;
}
echo json_encode($errorsar);




 ?>