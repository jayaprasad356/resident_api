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
if (empty($_POST['type'])) {
    $response['success'] = false;
    $response['message'] = "Type should be filled!";
    print_r(json_encode($response));
    return false;
}
$sql = "SELECT * FROM questions";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
$response['success'] = true;
$response['message'] = "Questions Retrived Successfully";
$response['data'] = $res;
print_r(json_encode($response));




?>