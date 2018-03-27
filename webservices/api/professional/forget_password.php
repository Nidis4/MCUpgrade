<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and admin object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
$professional->email = isset($_POST['email']) ? $_POST['email'] : die();

// query Admins
$stmt = $professional->forgetPassword();
 
// check if more than 0 record found
if($stmt){ 

    echo json_encode(
        array("ResultCode" => "1",'message' => 'Please check your email to reset password!')
    );
 
    
}
 
else{
    echo json_encode(
        array("ResultCode" => "0",'message' => 'Email address does not exist!')
    );
}
?>