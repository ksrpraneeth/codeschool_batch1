<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){  
  
    $headOfTheAccount = $_POST['headOfTheAccount'];
  }

  $HOA = [];
switch ($headOfTheAccount){

     case '0853001020002000000NVN':
      $HOA = [ "balance" => "1000000" , "LOC" => "5000"];
      break;

      case '8342001170004001000NVN':
      $HOA = [ "balance" => "1008340" , "LOC" => "4000"];
      break;
     
      case '2071011170004320000NVN ':
      $HOA = [ "balance" => "2008340" , "LOC" => "6000"];
      break;
     
      case '8342001170004002000NVN ':
      $HOA = [ "balance" => "1056400" , "LOC" => "34000"];
      break;

      case '2204000030006300303NVN ':
      $HOA = [ "balance" => "1234400" , "LOC" => "5000"];
      break;
      
      default :
      $HOA = [ "balance" => "" , "LOC" => ""];

  
    }
    echo json_encode($HOA);

?>


