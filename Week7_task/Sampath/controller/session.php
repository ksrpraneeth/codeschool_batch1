<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";

class Session{
    function addToken($sessionID, $userID){
        $currentDate = date('Y-m-d H:i:s');
        $expiryTime = Date('Y-m-d H:i:s', strtotime($currentDate . '+1 day'));
        $query = "INSERT INTO sessions (session_id, user_id, expiry_time) VALUES (?, ?, ?)";
        $queryResponse = (new DBConnection())->insertSingle($query, [$sessionID, $userID, $expiryTime]);
        return $queryResponse;
    }

    function checkToken($sessionID, $userID){
        $query = "SELECT * FROM sessions WHERE session_id = ? AND user_id = ?";
        $queryResponse = (new DBConnection())->selectSingle($query, [$sessionID, $userID]);
        return $queryResponse;
    }
}