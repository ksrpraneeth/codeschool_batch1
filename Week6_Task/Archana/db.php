<?php
ini_set('display_errors', 1);
$dbServer = 'localhost';
$dbDatabase = 'taskmanager';
$portnumber='5432';
$dbUsername = 'archana';
$dbPassword =  'archana';
$dsn = "pgsql:host=$dbServer;dbname=$dbDatabase;";
$pdo = new PDO($dsn,$dbUsername,$dbPassword,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if(!$pdo){ 
    echo "could not connect to the database";
    return;
}