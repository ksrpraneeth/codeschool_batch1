<?php
$rseult=[];
if(!isset($headofaccount)){
    $result[""]="headofaccount is missing";
}
$headofaccount=$_POST['headofaccount'];
if($headofaccount == ""){
    $result=["balance"=>"","loc"=>""];
}
if($headofaccount == "0853001020002000000NVN"){
    $result=["balance"=>"1000000","loc"=>"5000"];
}
if($headofaccount == "8342001170004001000NVN"){
    $result=["balance"=>"1008340","loc"=>"4000"];
}
if($headofaccount == "2071011170004320000NVN"){
    $result=["balance"=>"14530000","loc"=>"78000"];
}
if($headofaccount == "342001170004002000NVN"){
    $result=["balance"=>"1056400","loc"=>"34000"];
}
if($headofaccount == "2204000030006300303NVN"){
    $result=["balance"=>"123465400","loc"=>"5000"];
}
?>

