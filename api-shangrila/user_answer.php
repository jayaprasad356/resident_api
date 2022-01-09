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
if (empty($_POST['user_id'])) {
    $response['success'] = false;
    $response['message'] = "User ID filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['ques_no'])) {
    $response['success'] = false;
    $response['message'] = "Question Number filled!";
    print_r(json_encode($response));
    return false;
}
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
if (empty($_POST['result'])) {
    $response['success'] = false;
    $response['message'] = "Result to be filled!";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$ques_no = $db->escapeString($_POST['ques_no']);
$question = $db->escapeString($_POST['question']);
$option_1 = $db->escapeString($_POST['option_1']);
$option_2 = $db->escapeString($_POST['option_2']);
$option_3 = $db->escapeString($_POST['option_3']);
$option_4 = $db->escapeString($_POST['option_4']);
$correct_option = $db->escapeString($_POST['correct_option']);
$result = $db->escapeString($_POST['result']);
$sql = "INSERT INTO users_answers(`user_id`,`question_id`,`question`,`option_1`,`option_2`,`option_3`,`option_4`,`correct_option`,`result`)VALUES('$user_id','$ques_no','$question','$option_1','$option_2','$option_3','$option_4','$correct_option','$result')";
$db->sql($sql);
$res = $db->getResult();
$response['success'] = true;
$response['message'] = "Answers Submitted Successfully";
print_r(json_encode($response));




?>