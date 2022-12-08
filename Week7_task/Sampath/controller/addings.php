<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
class Addings
{
    private $DBConnection;
    public function __construct()
    {
        $this->DBConnection = new DBConnection();
    }

    public function getDeductions(){
        $query = "SELECT * FROM adding_types WHERE type = 'DEDUCTION'";
        $result = $this->DBConnection->select($query);
        return $result;
    }

    public function getEarnings(){
        $query = "SELECT * FROM adding_types WHERE type = 'EARNING'";
        $result = $this->DBConnection->select($query);
        return $result;
    }
}
