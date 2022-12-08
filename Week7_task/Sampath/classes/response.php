<?php
class Response
{
    private $status;
    private $message;
    private $data;
    public function __construct($status = false, $message = "", $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function getResponse()
    {
        return ["status" => $this->status, "message" => $this->message, "data" => $this->data];
    }

    public function getJSONResponse()
    {
        return json_encode($this->getResponse());
    }
}
