<?php 
$bankcode = $_POST['bankcode'];
$output = @file_get_contents('https://ifsc.razorpay.com/'.$bankcode);
//converting the given json into php objects
$output_s = json_decode($output);
if(isset($output_s)){
    echo json_encode(['status'=>true,'data'=>$output_s]);
}else{
    echo json_encode(['status'=>false, 'error'=> 'IFSC Code Not Correct']);
}
?>