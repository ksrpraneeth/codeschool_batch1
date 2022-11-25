<?php

class DBConnection
{
    private $pdo;
    private $host = 'localhost';
    private $db = 'postgres';
    private $user = 'postgres';
    private $password = 'postgres';
    public function __construct()
    {
        $dsn = "pgsql:host=$this->host;port=5432;dbname=$this->db;";
        $pdo = new PDO($dsn, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $this->pdo = $pdo;
    }
    public function getPdo()
    {
        return $this->pdo;
    }

    public function select($query, $parameters = null)
    {
        try {
            $pdo = (new DBConnection())->getPdo();

            $statement = $pdo->prepare($query);
            if ($parameters == null) {
                $statement->execute();
            } else {
                $statement->execute($parameters);
            }
            $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);

            return (new Response(true, "Success", $resultSet))->getResponse();
        } catch (\PDOException $e) {
            return (new Response(false, "DB Error: " . $e->getMessage()))->getResponse();
        }
    }

    public function selectSingle($query, $parameters = null)
    {
        try {
            $pdo = (new DBConnection())->getPdo();

            $statement = $pdo->prepare($query);
            if ($parameters == null) {
                $statement->execute();
            } else {
                $statement->execute($parameters);
            }
            $resultSet = $statement->fetch(PDO::FETCH_ASSOC);

            return (new Response(true, "Success", $resultSet))->getResponse();
        } catch (\PDOException $e) {
            return (new Response(false, "DB Error: " . $e->getMessage()))->getResponse();
        }
    }

    public function insertSingle($query, $parameters)
    {
        try {
            $pdo = (new DBConnection())->getPdo();

            $statement = $pdo->prepare($query);
            $statement->execute($parameters);
            return (new Response(true, "Success"))->getResponse();
        } catch (\PDOException $e) {
            return (new Response(false, "DB Error: " . $e->getMessage()))->getResponse();
        }
    }
}
