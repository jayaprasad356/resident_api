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
if (empty($_POST['ques_no'])) {
    $response['success'] = false;
    $response['message'] = "Question Number to be filled!";
    print_r(json_encode($response));
    return false;
}
$ques_no = $db->escapeString($_POST['ques_no']);
$sql = "SELECT * FROM questions WHERE id = '$ques_no'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num >= 1){
    $response['success'] = true;
    $response['message'] = "Question Retrived Successfully";
    $response['data'] = $res;
    print_r(json_encode($response));

}
else{
    $response['success'] = false;
    $response['message'] = "Ended";
    print_r(json_encode($response));

}





?>