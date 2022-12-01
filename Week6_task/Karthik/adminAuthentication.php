<?php
include 'apis/response.php';
include 'apis/db.php';

if(!isset($_SESSION))
session_start();
if (!isset($_SESSION['emp_id']) || !isset($_SESSION['role_id'])) {
    header("Location: login.php");
}
if ($_SESSION['role_id'] != "12") {
    header("Location: login.php");
}
?>