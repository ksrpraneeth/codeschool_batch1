<?php
$array1 = [];
if(!array_key_exists('expenditureType',$_POST)){
    array_push($array,"plase select expenditureType");
}
 $expenditureType = $_POST['expenditureType'];
switch($expenditureType){
    case ($expenditureType == "1") :
        $array1=["purposetype" =>["Maintain current levels of operation within the organization",
        "Expenses to permit future expansion"]];
        break;
    case ($expenditureType == "2") :
        $array1=["purposetype" => ["Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.",
        "All expenses incurred by the firm to guarantee the smooth operation"]];
        break;
    case ($expenditureType == "3") :
        $array1=["purposetype" =>   ["Exorbitant Advertising Expenditures",
         "Unprecedented Losses", 
         "Development and Research Cost"]];
        break;    
    default :
       $array1=["purposetype" =>" "];    
}
echo json_encode($array1);
?>