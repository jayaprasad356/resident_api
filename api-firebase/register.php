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
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['fullname'])) {
    $response['success'] = false;
    $response['message'] = "Full Name should be filled!";
    print_r(json_encode($response));
    return false;
}

if (empty($_POST['dob'])) {
    $response['success'] = false;
    $response['message'] = "DOB should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['SNI'])) {
    $response['success'] = false;
    $response['message'] = "SNI should be filled!";
    print_r(json_encode($response));
    return false;
}

$email = $db->escapeString($_POST['email']);
$fullname = $db->escapeString($_POST['fullname']);
$dob = $db->escapeString($_POST['dob']);
$password = $db->escapeString($_POST['password']);
$SNI = $db->escapeString($_POST['SNI']);
$sql = "SELECT * FROM users WHERE email = '" . $email . "'";
$db->sql($sql);
$res = $db->getResult();
$emailnum = $db->numRows($res);
$sql = "SELECT * FROM users WHERE SNI = '" . $SNI . "'";
$db->sql($sql);
$res = $db->getResult();
$SNInum = $db->numRows($res);
if ($emailnum == 1) {
    $response['success'] = false;
    $response['message'] = "Email already registered";
    print_r(json_encode($response));

}
if ($SNInum == 1) {
    $response['success'] = false;
    $response['message'] = "SNI already registered";
    print_r(json_encode($response));
}
else {
    $sql = "INSERT INTO users(`email`,`fullname`, `dob`, `password`, `SNI`)VALUES('$email','$fullname','$dob','$password','$SNI')";
    $db->sql($sql);
    $res = $db->getResult();
    $sql = "SELECT * FROM users WHERE SNI = '" . $SNI . "'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "User registered successfully";
    $response['data'] = $res;
    print_r(json_encode($response));

}

?>