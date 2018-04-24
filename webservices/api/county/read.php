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
 
// query categorys
$stmt = $county->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $counties_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $county_item=array(
            "id" => $id,
            "county_name" => $county_name,
            "county_name_gr" => $county_name_gr,
            "display_name_gr" => $display_name_gr
        );
 
        array_push($counties_arr, $county_item);
    }
 
    echo json_encode($counties_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Counties found.")
    );
}
?>