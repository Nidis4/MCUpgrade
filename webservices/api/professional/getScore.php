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
$cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : die();
$stmt = $professional->getScore($cat_id);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $professional_item=array(
            "professional_id" => $prof_id,
            "firstname" => $first_name,
            "lastname" => $last_name,
            "score" => $total
        );
 
        array_push($professionals_arr, $professional_item);
    }
 
    echo json_encode($professionals_arr);
}
else{
    echo json_encode(
        array("message" => "No Applications found.")
    );
}
?>