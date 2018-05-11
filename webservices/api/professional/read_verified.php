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

$verified = 1;


// query products
$stmt = $professional->readPaging(0, 1000, $verified);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // products array
    $professionals_arr=array();
    $professionals_arr["records"]=array();
    //$professionals_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $professional_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "address" => $address,
            "mobile" => $mobile,
            "phone" => $phone,
            "admin_comments" => $admin_comments,
            "meta_title" => $meta_title,
            "meta_description" => $meta_description,
            "meta_robots" => $meta_robots,
            "permalink" => $permalink

        );
 
        array_push($professionals_arr["records"], $professional_item);
    }
 
 
    // include paging
    //$total_rows=$professional->count();
    //$page_url="{$home_url}professional/read_paging.php?";
    //$paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    //$professionals_arr["paging"]=$paging;
 
    echo json_encode($professionals_arr);
}
else{
    echo json_encode(
        array("message" => "No Professionals found.")
    );
}
?>