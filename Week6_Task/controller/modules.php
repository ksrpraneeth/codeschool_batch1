<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
class Modules
{
    private $DBConnection;
    public function __construct()
    {
        $this->DBConnection = new DBConnection();
    }
    public function getModules()
    {
        $query = "SELECT * FROM modules";
        $queryResponse = $this->DBConnection->select($query);
        return $queryResponse;
    }

    public function getModuleMenu($moduleID)
    {
        $query = "SELECT * FROM sidebar_menu WHERE module_id = ?";
        $queryResponse = $this->DBConnection->select($query, [$moduleID]);
        return $queryResponse;
    }

    public function getModuleUrl($id)
    {
        $query = "SELECT url FROM modules WHERE id = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, $id);
        if ($queryResponse == false) {
            return false;
        } else {
            if ($queryResponse["data"] == false) {
                return false;
            }
            return $queryResponse["data"]["url"];
        }
    }

    public function getMenuUrlById($menuId)
    {
        $query = "SELECT * FROM sidebar_menu WHERE id = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, [$menuId]);
        if ($queryResponse == false) {
            return false;
        } else {
            if ($queryResponse["data"] == false) {
                return false;
            }
            return $queryResponse["data"]["url"];
        }}
}
