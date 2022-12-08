<?php 

include 'database.php';
 include 'response.php';



if (!array_key_exists('UserName', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a UserName";
    echo json_encode($response);
    return;
}
if (!array_key_exists('Password', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Password ";
    echo json_encode($response);
    return;
}
// if (!array_key_exists('exp_time', $_POST)) {
//     $response['status'] = false;
//     $response['message'] = "Please enter Expiry Time ";
//     echo json_encode($response);
//     return;
// }


 $pdo = connect();
 $statement = $pdo->prepare("select * from users where UserName =? and Password= ?");
 $statement->execute([$_POST['UserName'], md5($_POST['Password'])]);
 $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
 if (count($resultSet) == 0) {
            $response['status'] = false;
            $response['message'] = "Username or Password incorrect";
            echo json_encode($response);
          return;
      }
     
    
     $bytes = random_bytes(5);
     $token=  bin2hex($bytes);

     
$statement = $pdo->prepare("UPDATE users set token =? , exp_time =?  where username = ?");
// $statement= bindParam('exp_time', $exp_time);

$exp_time=date('Y-m-d H:i:s', strtotime('+1 hour'));
// $exp_time = new datetime('06-12-2022');
// $exp_time -> add(new dateinterval('PT1H3M10S'));

$statement->execute([$token,$exp_time,$resultSet[0]['username']]);

$response['status'] = true;
$response['message'] = "Login successful";
$response['data'] = $resultSet;
echo json_encode($response);
return;


