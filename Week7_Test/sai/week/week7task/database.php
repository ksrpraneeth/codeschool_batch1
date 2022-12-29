<?php


 
	$host= 'localhost';
    $db = 'employeesdata';
    $dbport = '5432';
    $user = 'postgres';
    $password = 'postgres';
	
	$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
	// make a database connection
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	if (!$pdo) {
        echo "Could not connect to the database";
        return;
    }
