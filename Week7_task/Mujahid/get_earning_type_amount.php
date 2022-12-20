<?php
// Includes the database connection file
include "conn.php";

// Get the earning type ID from the query string
$earningTypeId = $_GET['earningTypeId'];

// Retrieve the earning type amount from the database
$query = "SELECT amount FROM earnings WHERE id = ?";
$stmt = $dbh->prepare($query);
$stmt->execute([$earningTypeId]);
$earningTypeAmount = $stmt->fetchColumn();

// Return the earning type amount
echo $earningTypeAmount;
