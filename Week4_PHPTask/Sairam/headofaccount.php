<?php

$msgArray=[];

if(isset($headofAccount)){
    $msgArray[""]="headofAccount is missing";
    echo json_encode($msgArray);
    return;
    
}
$headofAccount=$_POST['headofAccount'];
if($headofAccount == "0853001020002000000NVN"){
    $msgArray=["balance"=>"0000000", "Loc"=>"100"];   
}
 if($headofAccount == "8342001170004001000NVN"){
    $msgArray=["balance" =>"1111111", "Loc" =>"200"];
 }
 if($headofAccount == "2071011170004320000NVN") {
    $msgArray=["balance" =>"2222222", "Loc" =>"300"];
 }
if($headofAccount == "8342001170004002000NVN") {
    $msgArray=["balance" =>"33333333","Loc" =>"400"];
}
echo json_encode($msgArray);
?>