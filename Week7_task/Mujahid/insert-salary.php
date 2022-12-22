<?php
include "conn.php";


$stmt = $dbh->prepare('INSERT INTO salary (name, phone_no, emp_code, earning_type_amount, deduction_amount, payable_salary) VALUES (?, ?, ?, ?, ?, ?)');

// Bind the form data to the statement
$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['phone_no']);
$stmt->bindValue(3, $_POST['emp_code']);
$stmt->bindValue(4, $_POST['earning_type']);
$stmt->bindValue(4, $_POST['earnings_total']);
$stmt->bindValue(5, $_POST['deductions_total']);
$stmt->bindValue(6, $_POST['payable_salary']);

$stmt->execute();


echo 'The id value for the inserted row is: ' . $id;

// Return a success message
echo 'Salary data inserted successfully!';
?>