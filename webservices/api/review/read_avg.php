<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/reviews.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$review = new Review($db);

// query products
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
    $stmt = $review->readAvgByCust($cust_id);
} 
elseif (isset($_GET['prof_id'])) {
    $prof_id = $_GET['prof_id'];    
    $stmt = $review->readAvgByProf($prof_id);
    
    
}elseif (isset($_GET['agent_id'])) {
    $agent_id = $_GET['agent_id'];
    $stmt = $review->readAvgByAgent($agent_id);
}
else {
    $stmt = $review->readAvg();
}

$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // products array
    $reviews_arr=array();
    $reviews_arr["records"]=array(); 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
 
        $review_item=array(
            "total" => $total,
            "quality_avg" => $quality_avg,
            "reliability_avg" => $reliability_avg,
            "cost_avg" => $cost_avg,
            "schedule_avg" => $schedule_avg,
            "behaviour_avg" => $behaviour_avg,
            "cleanliness_avg" => $cleanliness_avg,
        );
        array_push($reviews_arr["records"], $review_item);
    }
 
    echo json_encode($reviews_arr);
}
 
else{
    echo json_encode(
        array("message" => "No reviews found.")
    );
}
?>