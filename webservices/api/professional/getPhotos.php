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
$stmt = $professional->getPhotos();

$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num >= 1){    

    // products array
    $photos_arr = array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        
 
        $photo_item=array(
            "id" => $row['id'],
            "image_name" => $row['image_name']
        );
 
        array_push($photos_arr, $photo_item);
    }
 
        echo json_encode(
            array("records" => $photos_arr)
        );
    }else{
        echo json_encode(
            array("message" => "No photos found.")
        );
    }

?>