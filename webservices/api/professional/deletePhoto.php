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


// initialize object
$professional = new Professional($db);

$professional->professional_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();
$pid = isset($_POST['id']) ? $_POST['id'] : die();

$stmt = $professional->deletePhoto($pid);

 
// check if more than 0 record found
if($stmt){ 
    echo json_encode(
        array("message" => "Photo deleted successfully.","error"=>0)
    );
}else{
    echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
}
?>