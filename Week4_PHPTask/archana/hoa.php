<?php
ini_set('show_errors', 0);
$result=[];
if(!isset($_POST['headOfAccount'])){
    $result["error"]="headofaccount is missing";
    echo json_encode(['status' =>false,'data'=> $result]);
} else {
    $headofaccount = $_POST['headOfAccount'];
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
    echo json_encode(['status'=>true,'data'=> $result]);
}
?>