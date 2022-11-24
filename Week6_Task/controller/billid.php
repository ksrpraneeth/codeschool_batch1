<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";

class Billid
{
    public function getUserBillids($userID)
    {
        $query = "SELECT * FROM bill_ids WHERE user_id = ?";
        $queryResponse = (new DBConnection())->select($query, [$userID]);
        return $queryResponse;
    }
}
