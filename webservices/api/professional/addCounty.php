<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/professional.php';
 
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
 
// query products
$professional->id = isset($_GET['prof_id']) ? $_GET['prof_id'] : die();
$stmt = $professional->addCounty($_GET['county_id']);
 
// check if more than 0 record found
if($stmt >= 1){    

     echo json_encode(
            array("message" => "County Added Successfully")
        );
}
else
{
        echo json_encode(
            array("message" => "Please try again")
        );
}

?>