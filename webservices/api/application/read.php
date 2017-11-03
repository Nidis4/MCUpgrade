<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/application.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$application = new Application($db);
 
// query categorys
$stmt = $application->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $applications_arr=array();
    $applications_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $application_item=array(
            "id" => $id,
            "category_id" => $category_id,
            "title" => $title,
            "title_greek" => $title_greek,
            "short_description" => html_entity_decode($short_description),
            "short_description_gr" => html_entity_decode($short_description_gr),
            "detail_description" => html_entity_decode($detail_description),
            "detail_description_gr" => html_entity_decode($detail_description_gr),
            "unit" => $unit,
            "min_price" => $min_price,
            "sequence" => $sequence,
            "modified" => $modified
        );
 
        array_push($applications_arr["records"], $application_item);
    }
 
    echo json_encode($applications_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>