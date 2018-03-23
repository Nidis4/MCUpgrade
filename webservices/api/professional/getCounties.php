<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);
 
// query products
$professional->id = isset($_GET['prof_id']) ? $_GET['prof_id'] : die();
$stmt = $professional->getCounties();

$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num >= 1){    

    // products array
    $counties_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        
 
        $county_item=array(
            "county_id" => $row['county_id'],
            "county_name" => $row['county_name'],
            "is_main" => $row['is_main'],
        );
 
        array_push($counties_arr, $county_item);
    }
 
        echo json_encode($counties_arr);
    }else{
        echo json_encode(
            array("message" => "No categories found.")
        );
    }

?>