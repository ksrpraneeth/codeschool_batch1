<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
if(!checkSession()){
    echo (new Response(false, "Please Login"))->getJSONResponse();
    exit;
}
if (!isset($_POST['moduleID'])) {
    echo (new Response(false, "Module ID is missing"))->getJSONResponse();
    return;
}

$moduleID = $_POST['moduleID'];
if ($moduleID == '') {
    echo (new Response(false, "Please check the module ID"))->getJSONResponse();
    return;
}

$moduleResponse = (new Modules())->getModuleMenu($moduleID);
echo json_encode($moduleResponse);
return;
