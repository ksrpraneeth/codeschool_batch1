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

    public function getEmployeesByBillID($billID, $userId)
    {
        $query = "SELECT e.* FROM employee e, bill_ids b 
        WHERE e.bill_id = b.id
        AND e.bill_id = ? AND b.user_id = ?;
        ";
        $queryResponse = $this->DBConnection->select($query, [$billID, $userId]);
        return $queryResponse;
    }

    public function getEmployeeByEmpCode($empCode, $userId)
    {
        $query = "SELECT e.* FROM employee e, bill_ids b, users u
        WHERE e.bill_id = b.id AND b.user_id = u.id
        AND e.emp_code = ? AND u.id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$empCode, $userId]);
        return $queryResponse;
    }

    public function getEmployeeByBankAcNo($bankAcNo, $userId)
    {
        $query = "SELECT e.* FROM employee e, bill_ids b, users u
        WHERE e.bill_id = b.id AND b.user_id = u.id
        AND e.bank_ac_no = ? AND u.id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$bankAcNo, $userId]);
        return $queryResponse;
    }

    function getEmployeeEarnings($employeeId)
    {
        $query = "SELECT a.name, a.id, ea.id as emp_adding_id, a.cannot_delete, ea.amount as amount FROM adding_types a, employee_adding_types ea
        WHERE a.id = ea.adding_type_id AND a.type= 'EARNING' AND ea.emp_id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$employeeId]);
        return $queryResponse;
    }

    function getEmployeeDeductions($employeeId)
    {
        $query = "SELECT a.name, a.id, ea.id as emp_adding_id, ea.amount as amount FROM adding_types a, employee_adding_types ea
        WHERE a.id = ea.adding_type_id AND a.type= 'DEDUCTION' AND ea.emp_id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$employeeId]);
        return $queryResponse;
    }

    function getEmployeeBillIdByEmployeeId($employeeId)
    {
        $query = "SELECT bill_id FROM employee WHERE id = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, [$employeeId]);
        if ($queryResponse["data"] != false) {
            return $queryResponse["data"]["bill_id"];
        } else {
            return false;
        }
    }

    function getEmployeeByEmpId($empId, $userId)
    {
        $query = "SELECT e.* FROM employee e, bill_ids b, users u
        WHERE e.bill_id = b.id AND b.user_id = u.id
        AND e.id = ? AND u.id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$empId, $userId]);
        return $queryResponse;
    }

    function insertEmployeeAdding($empId, $addingId, $addingAmount){
        if($this->checkIfAddingAlreadyExists($addingId, $empId)){
            return (new Response(false, "Adding already exists", []))->getResponse();
        } else {
            $query = "INSERT INTO employee_adding_types (emp_id, adding_type_id, amount) VALUES (?, ?, ?)";
            $queryResponse = $this->DBConnection->insertSingle($query, [$empId, $addingId, $addingAmount]);
            if($queryResponse["status"] == false){
                return (new Response(false, "Adding failed", []))->getResponse();
            } else {
                return (new Response(true))->getResponse();
            }
        }
    }

    function checkIfAddingAlreadyExists($addingId, $empId){
        $query = "SELECT * FROM employee_adding_types WHERE adding_type_id =? AND emp_id =?;";
        $queryResponse = $this->DBConnection->select($query, [$addingId, $empId]);
        if($queryResponse["data"] == false){
            return false;
        }
        return true;
    }

    function deleteEmployeeAdding($id){
        $query = "DELETE FROM employee_adding_types WHERE id =?";
        $queryResponse = $this->DBConnection->deleteSingle($query, [$id]);
        return $queryResponse;
    }
}
