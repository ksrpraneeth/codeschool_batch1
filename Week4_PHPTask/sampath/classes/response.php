<?php
class Response
{
	public $status;
	public $message;
	public $data;
	function setResponse($status = null, $message = null, $data = null)
	{
		$this->status = $status;
		$this->message = $message;
		$this->data = $data;
		return $this;
	}

	function getResponse()
	{
		return json_encode([
			"status" => $this->status,
			"message" => $this->message,
			"data" => $this->data
		]);
	}
}
