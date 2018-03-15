<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/hear_options.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$hear_options = new HearOption($db);
 
// query categorys
$stmt = $hear_options->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $option_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $hear_options_item=array(
            "id" => $id,
            "option" => $option,
            "option_greek" => $option_greek,
        );
 
        array_push($option_arr, $hear_options_item);
    }
 
    echo json_encode($option_arr);
}
 
else{
    echo json_encode(
        array("message" => "No option found.")
    );
}
?>