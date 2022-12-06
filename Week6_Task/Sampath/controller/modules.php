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
    public function getModules($userId)
    {
        $query = "SELECT modules.* FROM modules, modules_users_map 
        WHERE modules_users_map.module_id = modules.id AND modules_users_map.user_id = ?;";
        $queryResponse = $this->DBConnection->select($query, [$userId]);
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

    public function getMenuUrlById($data)
    {
        $query = "SELECT * FROM sidebar_menu WHERE id = ? AND module_id = ?";
        $queryResponse = $this->DBConnection->selectSingle($query, $data);
        if ($queryResponse == false) {
            return false;
        } else {
            if ($queryResponse["data"] == false) {
                return false;
            }
            return $queryResponse["data"]["url"];
        }
    }
}
