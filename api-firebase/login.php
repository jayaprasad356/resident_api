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

if (empty($_POST['SNI'])) {
    $response['success'] = false;
    $response['message'] = "Sni should be filled!";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password should be filled!";
    print_r(json_encode($response));
    return false;
}

$SNI = $db->escapeString($_POST['SNI']);
$password = $db->escapeString($_POST['password']);
$sql = "SELECT * FROM users WHERE SNI = '" . $SNI . "' AND password = '" . $password . "'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $response["success"]   = true;
    $response['message'] = "Login Successfully";
    
    foreach ($res as $row) {
        $response['success']     = true;
        $response['id'] = $row['id'];
        $response['fullname'] = $row['fullname'];
        $response['SNI'] = $row['SNI'];
        
        
    }
    
    print_r(json_encode($response));
}
else {
    $response['success'] = false;
    $response['message'] = "SNI or Password Invalid";
    print_r(json_encode($response));

}


?>