<?php

include "db.php";
include "response.php";

if (!array_key_exists('projectIdInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Project ID";
    echo json_encode($response);
    return;
}
$projectIdInput = $_POST['projectIdInput'];
if (!array_key_exists('projectNameInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Project Name";
    echo json_encode($response);
    return;
}
$projectNameInput = $_POST['projectNameInput'];
if (!array_key_exists('projectClientInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Project Client";
    echo json_encode($response);
    return;
}
$projectClientInput = $_POST['projectClientInput'];
if (!array_key_exists('projectDescriptionInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Project Description";
    echo json_encode($response);
    return;
}
$projectDescriptionInput = $_POST['projectDescriptionInput'];
if (!array_key_exists('projectStartDateInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Project Start Date";
    echo json_encode($response);
    return;
}
$projectStartDateInput = $_POST['projectStartDateInput'];
if (!array_key_exists('projectEndDateInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter Project End Date";
    echo json_encode($response);
    return;
}
$projectEndDateInput = $_POST['projectEndDateInput'];
if (!array_key_exists('projectBudgetInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please enter a Project Budget";
    echo json_encode($response);
    return;
}
$projectBudgetInput = $_POST['projectBudgetInput'];
if (!array_key_exists('empIdInput', $_POST)) {
    $response['status'] = false;
    $response['message'] = "Please Select Project Manager";
    echo json_encode($response);
    return;
}
$empIdInput = $_POST['empIdInput'];
if (strlen($projectIdInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  Project ID";
    echo json_encode($response);
    return;
}
if (strlen($projectNameInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  Project Name";
    echo json_encode($response);
    return;
}
if (strlen($projectClientInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  Project Client";
    echo json_encode($response);
    return;
}
if (strlen($projectDescriptionInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  Project description";
    echo json_encode($response);
    return;
}
if (strlen($projectBudgetInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  Project budget";
    echo json_encode($response);
    return;
}
if (strlen($projectStartDateInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  Project Start Date";
    echo json_encode($response);
    return;
}
if (strlen($projectEndDateInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please enter  project End Date";
    echo json_encode($response);
    return;
}
if (strlen($empIdInput) == 0) {
    $response['status'] = false;
    $response['message'] = "Please Select Project Manager";
    echo json_encode($response);
    return;
}
try {
    $statement = $pdo->prepare("select * from projects where project_id=?");
    $statement->execute([($projectIdInput)]);
    $resultSet = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultSet) != 0) {
        $response['status'] = False;
        $response['message'] = "Project already Exists";
        $response['data'] = $resultSet;
        echo json_encode($response);
        return;
    }

    $statement = $pdo->prepare("insert into projects(project_id,project_name,client,description,start_date,end_date,budget,Manager) values(?,?,?,?,?,?,?,?)");
    $statement->execute([($projectIdInput),($projectNameInput),($projectClientInput),($projectDescriptionInput),($projectStartDateInput),($projectEndDateInput),($projectBudgetInput),($empIdInput)]);
    $response['status'] = true;
    $response['message'] = "Project added";
    echo json_encode($response);
    return;
} catch (PDOException $e) {
    $response['status'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}
?>