<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
class Employee
{
    private $DBConnection;
    public function __construct()
    {
        $this->DBConnection = new DBConnection();
    }

    public function getEmployeesByBillID($billID)
    {
        $query = "SELECT * FROM employee WHERE bill_id = ?";
        $queryResponse = $this->DBConnection->select($query, [$billID]);
        return $queryResponse;
    }

    public function getEmployeeByEmpCode($empCode)
    {
        $query = "SELECT * FROM employee WHERE emp_code = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, [$empCode]);
        return $queryResponse;
    }

    public function getEmployeeByBankAcNo($bankAcNo)
    {
        $query = "SELECT * FROM employee WHERE bank_ac_no = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, [$bankAcNo]);
        return $queryResponse;
    }
}
