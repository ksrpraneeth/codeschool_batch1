<?php


    // $CapitalExpenditure = $_POST['CapitalExpenditure'];
    // $RevenueExpenditure = $_POST['RevenueExpenditure'];
    // $firstNaDeferredRevenueExpenditureme = $_POST['DeferredRevenueExpenditure']; 
 
// $expenditure = [ 
//     "CapitalExpenditure" => "helloooo",
//    // "CapitalExpenditure" =>["Select", "Maintain current levels of operation within the organization","Expenses to permit future expansion."] ,
//     "RevenueExpenditure" => ["Select","Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services" ," All expenses incurred by the firm to guarantee the smooth operation"],
//     "DeferredRevenueExpenditure" => ["Select","Exorbitant Advertising Expenditures","Unprecedented Losses","Development and Research Cost York"]
// ];

// if (($expenditure) == "CapitalExpenditure" ){
//     echo json_encode($ifscCodear);
// }
// if (($expenditure) == "RevenueExpenditure" ){
//     echo json_encode($expenditure['RevenueExpenditure']);
// }
// if (($expenditure) == "DeferredRevenueExpenditure" ){
//     echo json_encode($expenditure['DeferredRevenueExpenditure']);
// }


if($_SERVER['REQUEST_METHOD'] == 'POST'){  
  
    $expenditureType = $_POST['expenditureType'];
  }

  $expenditureTypearr = [];
switch ($expenditureType){

     case '1':
      $expenditureTypearr = ["Select", "Maintain current levels of operation within the organization","Expenses to permit future expansion."]  ;
      break;

      case '2':
      $expenditureTypearr = ["Select","Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services" ," All expenses incurred by the firm to guarantee the smooth operation"] ;
      break;
     
      case '3':
      $expenditureTypearr =  ["Select","Exorbitant Advertising Expenditures","Unprecedented Losses","Development and Research Cost York" ]  ;
      break;

  
    }
    echo json_encode($expenditureTypearr);


 ?>   