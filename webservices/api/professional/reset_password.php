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
$password = isset($_POST['password']) ? $_POST['password'] : die();
$resetkey = isset($_POST['resetkey']) ? $_POST['resetkey'] : die();

// query Admins
$stmt = $professional->resetPassword($password,$resetkey);
 
// check if more than 0 record found
if($stmt){ 

    echo json_encode(
        array("ResultCode" => "1",'message' => 'Your password has been reset!')
    );
 
    
}
 
else{
    echo json_encode(
        array("ResultCode" => "0",'message' => 'Link has been expired, please try again!')
    );
}
?>