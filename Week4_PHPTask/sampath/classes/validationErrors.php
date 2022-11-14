<?php

class ValidationErrors{
	private $errors;
	function __construct(){
		$this->errors = [];
	}
	function pushError($errorKey, $errorValue){
		$this->errors[$errorKey][] =  $errorValue;
	}

	function getErrors(){
		return $this->errors;
	}
}
