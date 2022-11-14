<?php
$result=[];
if(!isset($headOfAccount)){
     $result[""]="headOfAccount is missing";
}
$headOfAccount=$_POST['headOfAccount'];
if($headOfAccount == ""){
    $result=["balance"=>"","loc"=>""];
}
if($headOfAccount == "0853001020002000000NVN"){
    $result=["balance"=>"1000000","loc"=>"5000"];
}
if($headOfAccount == "8342001170004001000NVN"){
    $result=["balance"=>"1008340","loc"=>"4000"];
}
if($headOfAccount == "2071011170004320000NVN"){
    $result=["balance"=>"14530000","loc"=>"78000"];
}
if($headOfAccount == "8342001170004002000NVN"){
    $result=["balance"=>"1056400","loc"=>"34000"];
}
if($headOfAccount == "2204000030006300303NVN"){
    $result=["balance"=>"123465400","loc"=>"5000"];
}
echo json_encode($result);
?>