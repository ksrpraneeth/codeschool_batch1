<?php
class postResponse

{
    public $status;
    public $message;

     function __construct($status,$message)
     {
        $this->status = $status;
        $this->message = $message;

     }
}