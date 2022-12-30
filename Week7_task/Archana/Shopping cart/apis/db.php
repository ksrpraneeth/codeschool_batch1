
<?php
ini_set('display_errors',1);
$dbServer = 'localhost';
$dbDatabase = 'postgres';
$portnumber='5432';
$dbusername = 'postgres';
$dbPassword =  'postgres';
$dsn = "pgsql:host=$dbServer;port=5432;dbname=$dbDatabase;";
//database conection
$pdo = new PDO($dsn, $dbusername, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if(!$pdo){ 
    echo "could not connect to the database";
    return;
}