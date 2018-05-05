<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/call.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$call = new Call($db);
 
// query products
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
    $stmt = $call->readPagingByCust($from_record_num, $records_per_page, $cust_id);
} 
elseif (isset($_GET['prof_id'])) {
    $prof_id = $_GET['prof_id'];
    $stmt = $call->readPagingByProf($from_record_num, $records_per_page, $prof_id);
}elseif (isset($_GET['agent_id'])) {
    $agent_id = $_GET['agent_id'];
    $stmt = $call->readPagingByAgent($from_record_num, $records_per_page, $agent_id);
}
else {
    $stmt = $call->readPaging($from_record_num, $records_per_page);
}
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $calls_arr=array();
    $calls_arr["records"]=array();
    $calls_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $call_item=array(
            "id" => $id,
            "about" => $about,
            "date" => $date,
            "duration" => $duration,
            "agent_id" => $agent_id,
            "comment" => $comment,
            "name" => $name,
            "surname" => $surname,
            "mobile" => $mobile,
            "land_line" => $land_line,
            "rconrding" => $rconrding,
            "comment" => $comment,
            "datetimeCreated" => $datetimeCreated,
            "status" => $status,
            "uuid_ivr" => $uuid_ivr,
            "call_status" => $call_status
        );
       
        array_push($calls_arr["records"], $call_item);
    }
 
 
    // include paging
    $total_rows=$call->count();
    $page_url="{$home_url}call/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $calls_arr["paging"]=$paging;
 
    echo json_encode($calls_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>