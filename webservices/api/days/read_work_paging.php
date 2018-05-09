<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/day.php';
 
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$days = new Day($db);
 
// query products
$stmt = $days->readWorkPaging();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $day_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    $i = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $day_item=array(
            "id" => $id,
            "working_date" => $working_date,
            "start_time"   => $start_time,
            "end_time"     => $end_time,
            "is_holiday"   => $is_holiday,
        );
        
        $day_arr["records"][$i]  = $day_item;
        $i++;
    }
 
 
   
 
    echo json_encode($day_arr);
}
 
else{
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>