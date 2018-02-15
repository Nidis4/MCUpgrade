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
$professional->id = isset($_GET['id']) ? $_GET['id'] : die();
$stmt = $professional->getApplications();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $professional_item=array(
            "category" => $name_greek,
            "application" => $title_greek,
            "category_id" => $category_id
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