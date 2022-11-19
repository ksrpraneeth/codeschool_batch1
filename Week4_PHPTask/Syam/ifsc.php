 <?php
$bank = [];
if(array_key_exists('ifscCode',$_POST)){
   $ifscCode = $_POST["ifscCode"];
   // return;


if(strlen($ifscCode) != 11){
    array_push($bank, "Ifsc Code should contains 11 digits");
     //return;
}
if(!preg_match("/[A-Z]{4}[0][0-9A-Za-z]{6}/",$ifscCode)){
    array_push($bank, "Enter Ifsc Code in valid format");
//return;
 }
 
  if(preg_match("/[A-Z]{4}[0][0-9A-Za-z]{6}/",$ifscCode)){
     $bank = ["bankname" => "Canara","bankbranch" => "JMD"];     
  }

}else{
    array_push($bank, "Please Enter ifscCoden in valid format");
}
echo json_encode($bank);
?> 