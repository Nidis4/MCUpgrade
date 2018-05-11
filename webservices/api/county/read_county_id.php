<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/county.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$county = new County($db);
 
$permalink = isset($_GET['permalink']) ? $_GET['permalink'] : die();
$stmt = $county->read_county_id($permalink);


   
 
        $county_item=array(
            "id" => $county->id,
            "county_name" => $county->county_name,
            "county_name_gr" => $county->county_name_gr,
            "display_name_gr" => $county->display_name_gr,
            "permalink" => $county->permalink
            
        );
 
    echo json_encode($county_item);

 

?>