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
        $queryResponse = $this->DBConnection->select($query, [$empCode]);
        return $queryResponse;
    }

    public function getEmployeeByBankAcNo($bankAcNo)
    {
        $query = "SELECT * FROM employee WHERE bank_ac_no = ?";
        $queryResponse = $this->DBConnection->select($query, [$bankAcNo]);
        return $queryResponse;
    }

    function getEmployeeEarnings($employeeId)
    {
        $query = "SELECT a.name, a.id FROM adding_types a, employee_adding_types ea
        WHERE a.id = ea.adding_type_id AND a.type= 'EARNING' AND ea.emp_id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$employeeId]);
        return $queryResponse;
    }

    function getEmployeeDeductions($employeeId)
    {
        $query = "SELECT a.name, a.id FROM adding_types a, employee_adding_types ea
        WHERE a.id = ea.adding_type_id AND a.type= 'DEDUCTION' AND ea.emp_id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$employeeId]);
        return $queryResponse;
    }

    function getEmployeeBillIdByEmployeeId($employeeId)
    {
        $query = "SELECT bill_id FROM employee WHERE id = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, [$employeeId]);
        if($queryResponse["data"] != false){
            return $queryResponse["data"]["bill_id"];
        } else {
            return false;
        }
    }
}
