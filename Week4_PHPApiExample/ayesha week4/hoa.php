<?php
   $balances = [
    "0853001020002000000NVN" => [
"balance" => 000000,
"loc" => 5000,
],
"8342001170004001000NVN"=> [
    "balance" => 14530000,
    "loc" => 78000,
    ],
    "2071011170004320000NVN"=> [
        "balance" => 1008340,
        "loc"=> 40000,
    ]
    ];
   $headOfAccount = $_POST['data']['headOfAccount'];
   if(array_key_exists($headOfAccount, $balances){
    $data= $balances[$headOfAccount];
    echo json_encode(['status'=>true,'data'=>$data]);
   }
    else{
        echo json_encode(['status'=>false, 'error'=> 'Not found']);
    }
   ?>  



