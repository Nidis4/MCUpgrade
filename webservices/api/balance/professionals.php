<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/balance.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$balance = new Balance($db);
 
// query categorys
$stmt = $balance->professionals();






// check if more than 0 record found
if(count($stmt)){
    
    echo json_encode($stmt);
    
} 
else{
    echo json_encode(
        array("message" => "No Record found.")
    );
}
?>