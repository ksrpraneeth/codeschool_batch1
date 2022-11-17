<?php
$errors = [];
$data = [];
$ifscCode = isset($_POST['ifscCode']) ? $_POST['ifscCode'] : null;
if (empty($ifscCode)) {
    $errors["ifscCode"] = "Please enter ifsccode";
} else{
    if (!preg_match("/[A-Z]{4}0[0-9]{6}/", $ifscCode)) {
        $errors["ifscCode"] = "Please enter valid ifsc code";
    } else {
        $banks = [
            "SBIN0123456" => ["bank" => "SBI", "branch" => "HYD"],
            "KKBK0789012" => ["bank" => "KOTAK", "branch" => "VIZAG"],
            "ICIC0345678" => ["bank" => "ICICI", "branch" => "KHAMMAMM"],
            "SBHY0901234" => ["bank" => "SBH", "branch" => "WARANGAL"]
        ];
        if (array_key_exists($ifscCode, $banks)) {
            $data = $banks[$ifscCode];
        } else {
            $errors["ifscCode"] = "ifscCode data not found";
        }
    }
}
if (count($errors) > 0) {
    echo json_encode(['status' => false, 'errors' => $errors]);
} else {
    echo json_encode(['status' => true, 'data' => $data]);
}
?>