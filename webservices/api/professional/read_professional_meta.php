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
include_once '../objects/professional.php';

$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);

$professional_permalink= isset($_GET['prof_permalink']) ? $_GET['prof_permalink'] : die();

$stmt = $professional->read_professional_meta($professional_permalink);

$professional_meta=array(
            "professional_id" => $professional->professional_id,
            "meta_title" => $professional->meta_title,
            "meta_description" => $professional->meta_description,
            "meta_robots" => $professional->meta_robots,
            "permalink" => $professional->permalink
            
        );
 
    echo json_encode($professional_meta);

?>