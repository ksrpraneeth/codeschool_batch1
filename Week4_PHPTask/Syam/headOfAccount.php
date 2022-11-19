<?php
$array = [];
if(!array_key_exists('headOfAccount',$_POST)){
    array_push($array,"please select headOfAccount");
}
 $headOfAccount = $_POST['headOfAccount'];
switch($headOfAccount){
    case ($headOfAccount == "0853001020002000000NVN") :
        $array=["balance" =>"1000000","loc" => "5000"];
        break;
    case ($headOfAccount == "8342001170004001000NVN") :
        $array=["balance" =>"1008340","loc" => "4000"];
        break;
    case ($headOfAccount == "2071011170004320000NVN") :
        $array=["balance" =>"14530000","loc" => "78000"];
        break;    
    case ($headOfAccount == "8342001170004002000NVN") :
        $array=["balance" =>"1056400","loc" => "34000"];
        break;
    case ($headOfAccount == "2204000030006300303NVN") :
        $array=["balance" =>"123465400","loc" => "5000"];
        break;
    default :
    $array=["balance" =>" ","loc" => " "];    
}
echo json_encode($array);
?>