<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/help.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$helps = new Help($db);
 
// query products
$stmt = $helps->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $help_arr=array();
    $help_arr["records"]=array();
    $help_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $help_item=array(
            "id" => $id,
            "category_id" => $category_id,
            "category_name" => $category_name,
            "category_name_greek" => $category_name_greek,
            "name" => $name,
            "help" => $help
        );
 
        array_push($help_arr["records"], $help_item);
    }
 
 
    // include paging
    $total_rows = $helps->count();
    $page_url="{$home_url}help/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $help_arr["paging"]=$paging;
 
    echo json_encode($help_arr);
}
 
else{
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>