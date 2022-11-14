<?php
$response = [
    "details" => [
    ],
];
if (!isset($bankIFSCCode)) {
    $reponse["details"] = "IFSC Code is missing";
    $bankIFSCCode = $_POST['bankIFSCCode'];
}
if (strlen($bankIFSCCode) != 11) {
    $response = [
        "details" => [
            "Error" => "Invalid Ifsc Code",
            "bankName" => "",
            "bankBranch" => ""
        ]
    ];
}
if (preg_match("/[A-Z]{4}[0][0-9]{6}/", $bankIFSCCode) && strlen($bankIFSCCode)==11) {
    $response = [
        "details" => [
            "Error" => "",
            "bankName" => "SBI",
            "bankBranch" => "Hyd"
        ]
    ];
}
if (preg_match("/[ICIC]{4}[0][0-9]{6}/", $bankIFSCCode)) {
    $response = [
        "details" => [
            "Error" => "",
            "bankName" => "ICICI",
            "bankBranch" => "Hyd"
        ]
    ];
}
echo json_encode($response)
    ?>