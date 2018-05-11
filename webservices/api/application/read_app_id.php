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
include_once '../objects/application.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$application = new Application($db);

// set ID property of product to be edited
$permalink = isset($_GET['permalink']) ? $_GET['permalink'] : die();


//echo $category->id;

    // create array
    $stmt = $application->read_app_id($permalink);
 
    $application_arr=array(
        "application_id" => $application->application_id,
        "meta_title" => $application->meta_title,
        "meta_description" => $application->meta_description,
        "meta_robots" => $application->meta_robots,
        "permalink" => $application->permalink

        
    );
     
    echo json_encode($application_arr);
?>