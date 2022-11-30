<?php

// function validate($str) {
//     return trim(htmlspecialchars($str));
// }

// if (empty($_POST['name'])) {
//     $nameError = 'Name should be filled';
// } else {
//     $name = validate($_POST['name']);
//     if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
//         $nameError = 'Name can only contain letters, numbers and white spaces';
//     }
// }

if($_POST['data']){
    validate();
}
function validate(){
    $errors = [];
    $dataInVariables = ['partyaccount'];
    foreach($dataInVariables as $variable){
        if(!isset($_POST['$variable'])){
            echo json_encode(['status'=>false, 'errors'=> ["notFoundError" => $variable . " is not found in data!"]]);
            return;
        }
    }
    $partyaccount = $_POST['data']['partyaccount'];
    $cpartyaccount = $_POST['data']['cpartyaccount'];
    $partyname = $_POST['data']['partyname'];
    $purpose = $_POST['data']['purpose'];

    if ($partyaccount == '') {
        $errors['e_partyaccount'] = "Please enter your party account number";
    }
    if (strlen($partyaccount) < 12) {
        $errors['e_partyaccount'] = "This field should contain minimum 12 Digits";
    }
    if (strlen($partyaccount) > 22) {
        $errors['e_partyaccount'] = "This field should contain maximum 22 Digits";
    }
    if($cpartyaccount!=$partyaccount)
    {
        $errors['e_cpartyaccount'] = "Values should match";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $partyname))
    {
        $errors['e_partyname'] = "Should not contain special characters";
    }
    if ($purpose == '') {
        $errors['e_purpose'] = "Purpose is necessary!";
    }
    if(count($errors)>0){
        echo json_encode(['status'=>false, 'errors'=> $errors]);
    }

}
?>