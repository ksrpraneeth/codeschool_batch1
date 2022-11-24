<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/modules.php";

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
