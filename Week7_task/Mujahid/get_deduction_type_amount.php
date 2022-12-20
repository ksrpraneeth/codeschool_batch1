<?php
// Includes the database connection file
include "conn.php";

// Get the deduction type ID from the query string
$deductionTypeId = $_GET['deductionTypeId'];

// Retrieve the deduction type amount from the database
$query = "SELECT amount FROM deduction WHERE id = ?";
$stmt = $dbh->prepare($query);
$stmt->execute([$deductionTypeId]);
$deductionType = $stmt->fetch();

// Return the deduction type amount
echo $deductionType['amount'];
