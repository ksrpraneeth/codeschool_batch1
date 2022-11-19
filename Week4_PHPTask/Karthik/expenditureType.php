<?php
$result = [];
if (!isset($expenditureType)) {
    $result[""] = "expenditureType is missing";
}
$expenditureType = $_POST['expenditureType'];
if ($expenditureType == "") {
    $result = [];
}
if ($expenditureType == "Capital_Expenditure") {
    $result = [
        "Select",
        "Maintain current levels of operation within the organization",
        "Expenses to permit future expansion"
    ];
}
if ($expenditureType == "Revenue_Expenditure") {
    $result = [
        "Select",
        "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.",
        "All expenses incurred by the firm to guarantee the smooth operation."
    ];
}
if ($expenditureType == "Deferred_Revenue_Expenditure") {
    $result = [
        "Select",
        "Exorbitant Advertising Expenditures",
        "Unprecedented Losses",
        "Development and Research Cost"
    ];
}

echo json_encode($result);
?>