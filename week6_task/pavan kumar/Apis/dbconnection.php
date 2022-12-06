<?php

function getDbConnection()
{
	try {
		$host = 'localhost';
		$db = 'hospital_management';
		$user = 'postgres';
		$password = 'postgres';
		$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
		// make a database connection
		$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		if ($pdo) {
			return $pdo;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	} finally {
		if ($pdo) {
			$pdo = null;
		}
	}
	return null;
}

