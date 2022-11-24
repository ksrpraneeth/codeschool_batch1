<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";

$controllerResponse = (new Modules())->getModules();
echo json_encode($controllerResponse);
