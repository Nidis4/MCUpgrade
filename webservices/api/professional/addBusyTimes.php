<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();
$busy_date = isset($_POST['busy_date']) ? $_POST['busy_date'] : die();
$busy_time = isset($_POST['busy_time']) ? $_POST['busy_time'] : "";

if ( $busy_time == "" ){
    $busy_time = ("08:00-22:00");
}
// initialize object
$professional = new Professional($db);
 
// query products
$stmt = $professional->addBusy($prof_id, $busy_date, $busy_time);
 
// check if more than 0 record found
if($stmt){
    echo json_encode(
        array("message" => "Busy Time added successfully.")
    );
}else{
    echo json_encode(
        array("message" => "Busy Time Not Added.")
    );
}
?>
