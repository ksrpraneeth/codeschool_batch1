<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/db.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
class User
{
    public function login($username, $password)
    {
        $query = "SELECT id, name FROM users WHERE username=? AND password=?";
        $queryResponse = (new DBConnection())->selectSingle($query, [$username, md5($password)]);

        if ($queryResponse["data"] == false) {
            return (new Response(false, "Incorrect credentials"))->getResponse();
        } else {
            return (new Response(true, "Success", $queryResponse["data"]))->getResponse();
        }
    }
}
