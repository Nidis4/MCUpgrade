<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/viber.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// get keywords
$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : die();
$messagetext = isset($_POST["messagetext"]) ? $_POST["messagetext"] : die();


// Viber Connection         
$viber = new Viber($db);
 
// query products
$stmt = $viber->send($mobile, $messagetext);
 
// check if more than 0 record found
if($stmt){
 
     echo json_encode(
        array("message" => "Message sent successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "Please try again.")
    );
}
?>