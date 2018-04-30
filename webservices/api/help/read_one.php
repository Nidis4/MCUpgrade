<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/help.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$helps = new Help($db);

// set ID property of product to be edited
$helps->id = isset($_GET['id']) ? $_GET['id'] : die();




// create array
$stmt = $helps->readOne();

if($stmt){
    $help_arr=array(
        "id" => $helps->id,
        "name" => $helps->name,
        "category_id" => $helps->category_id,
        "help" => $helps->help
    );
}else{
    $help_arr= array();
}

     
 
echo json_encode($help_arr);
?>