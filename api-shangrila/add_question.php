<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include_once('../includes/crud.php');
$db = new Database();
$db->connect();
if (empty($_POST['question'])) {
    $response['success'] = false;
    $response['message'] = "Question be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['option_1'])) {
    $response['success'] = false;
    $response['message'] = "Option 1 to be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['option_2'])) {
    $response['success'] = false;
    $response['message'] = "Option 2 to be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['option_3'])) {
    $response['success'] = false;
    $response['message'] = "Option 3 be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['option_4'])) {
    $response['success'] = false;
    $response['message'] = "Option 4 be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['correct_option'])) {
    $response['success'] = false;
    $response['message'] = "Correct Option to be filled!";
    print_r(json_encode($response));
    return false;
}

$question = $db->escapeString($_POST['question']);
$option_1 = $db->escapeString($_POST['option_1']);
$option_2 = $db->escapeString($_POST['option_2']);
$option_3 = $db->escapeString($_POST['option_3']);
$option_4 = $db->escapeString($_POST['option_4']);
$correct_option = $db->escapeString($_POST['correct_option']);

$sql = "INSERT INTO questions(`question`,`option_1`,`option_2`,`option_3`,`option_4`,`correct_option`)VALUES('$question','$option_1','$option_2','$option_3','$option_4','$correct_option')";
$db->sql($sql);
$response['success'] = true;
$response['message'] = "Question Added successfully";
print_r(json_encode($response));

?>