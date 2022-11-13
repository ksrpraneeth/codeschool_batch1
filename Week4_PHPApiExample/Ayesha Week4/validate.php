<?php
if($_POST['data']['source']=='normal'){
    normalValidation();
}
function normalValidation(){
    $errors = [];
    $partyaccount = $_POST['data']['partyaccount'];
    $cpartyaccount = $_POST['data']['cpartyaccount'];
    $partyname = $_POST['data']['partyname'];
    $purpose = $_POST['data']['purpose'];

    //party account validation
    if ($partyaccount == '') {
        $errors['e_partyaccount'] = "Enter Party Account Number";
    }
    if (strlen($partyaccount) < 12) {
        $errors['e_partyaccount'] = "Minimum 12 Digits";
    }
    if (strlen($partyaccount) > 22) {
        $errors['e_partyaccount'] = "Maximum 22 Digits";
    }
    //confirm party account
    if($cpartyaccount!=$partyaccount)
    {
        $errors['e_cpartyaccount'] = "Values should match";
    }
    //partyname validation
    if (!preg_match("/^[a-zA-Z ]*$/", $partyname))
    {
        $errors['e_partyname'] = "Should not contain special characters";
    }
    //purpose validation
    if ($purpose == '') {
        $errors['e_purpose'] = "Purpose is necessary!";
    }
    if(count($errors)>0){
        echo json_encode(['status'=>false, 'errors'=> $errors]);
    }else{
        echo json_encode(['status'=>true,'data'=> $_POST['data']]);
    }
}
?>