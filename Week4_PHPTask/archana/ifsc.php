<?php
if(isset($_POST['ifsc'])) {
    $ifsc = $_POST['ifsc'];
    $output = @file_get_contents("https://ifsc.razorpay.com/".$ifsc);
    //converting the given json into php objects
    // $output_s = json_decode($output);
  if($output != "Not Found"){
    echo json_encode(['status' =>true,'data'=> json_decode($output)]);
  }else{
      echo json_encode(['status' =>false,'error'=>'ifsc code is not correct']);
    }

  }
?>
