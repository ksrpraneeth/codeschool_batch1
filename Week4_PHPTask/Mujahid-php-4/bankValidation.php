<?php
$bankcode = $_POST['bankcode'];
$output = @file_get_contents('https://ifsc.razorpay.com/' . $bankcode);
$output_s = json_decode($output);
if (isset($output_s)) {
    echo json_encode(['status' => true, 'data' => $output_s]);
} else {
    echo json_encode(['status' => false, 'error' => 'Please enter correct IFSC code']);
}
?>