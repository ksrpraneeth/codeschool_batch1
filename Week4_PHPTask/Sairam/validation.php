<?php
//  $partyAccountnumber = $_POST["partyAccountnumber"];
//   $confirmpartyAccountnumber = $_POST["confirmpartyAccountNumber"];
//   $partyName = $_POST["partyName"];
//   $purpose
// $bankifsccode = $_POST["ifsccode"];
// $partyAmount = $_POST["partyAmount"];

$messagesArray = [];


if (!array_key_exists("partyAccountnumber", $_POST)) {
array_push($messagesArray,"please enter partyAccountNumber");
echo jSON_encode($messagesArray);
return;
}
 $partyAccountnumber = $_POST['partyAccountnumber'];
if (strlen($partyAccountnumber)  <12||(strlen($partyAccountnumber)) >22){
    array_push($messagesArray, "partyAccountnumber must be lessthan 12-22");
    echo jSON_encode($messagesArray);
    return;
}
if (!array_key_exists("confirmpartyAccountNumber",$_POST)){
    array_push($messagesArray,"please enter confirmpartyAccountNumber");
    echo jSON_encode($messagesArray);
    return;
}

$confirmpartyAccountNumber = $_POST['confirmpartyAccountNumber'];
if($partyAccountnumber !=$confirmpartyAccountNumber){
    array_push($messagesArray, "please  enter partyAccountnumber and confirmpartyAccountNumber should  be same");
    echo jSON_encode($messagesArray);
    return;
}


  if (!array_key_exists("partyName", $_POST)){

    array_push($messagesArray,  "Please enter PartyName");
    echo jSON_encode($messagesArray);
     return;
}

$partyName = $_POST['partyName'];

if (!preg_match("/[a-zA-Z]/", $partyName)){
    array_push($messagesArray, "Party Name should not have Spaces and Special Characters");
    echo jSON_encode($messagesArray);
    return;
}

if (!array_key_exists("purpose", $_POST)){

    array_push($messagesArray,  "Please enter purpose");
    echo jSON_encode($messagesArray);
     return;
}

  $purpose = $_POST["purpose"];
if(strlen($purpose) == 0){
array_push($messagesArray, "enter purpose here");
   echo jSON_encode($messagesArray);
    return;
}

if(strlen($purpose) >500){
    array_push($errorArray,"purpose  is lessthan 500characters");
}




echo json_encode($messagesArray);

?>
