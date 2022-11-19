
<?php
$array = [];
if(!array_key_exists('Expendituretype',$_POST)){
    array_push($array,"plase select Expendituretype");
}
 $Expendituretype = $_POST['Expendituretype'];
switch($Expendituretype){
    case ($Expendituretype == "1") :
        $array=["Purposetype" =>["Maintain current levels of operation within the organization",
        "Expenses to permit future expansion"]];
        break;
    case ($Expendituretype == "2") :
        $array=["Purposetype" => ["Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.",
        "All expenses incurred by the firm to guarantee the smooth operation"]];
        break;
    case ($Expendituretype == "3") :
        $array=["Purposetype" =>   ["Exorbitant Advertising Expenditures",
         "Unprecedented Losses", 
         "Development and Research Cost"]];
        break;    
    default :
       $array=["Purposetype" =>" "];    
}
echo json_encode($array);
?>