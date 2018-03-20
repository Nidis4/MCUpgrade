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

if(isset($_GET['from_record_num']) && !empty($_GET['from_record_num'])){
    $from_record_num = (int)$_GET['from_record_num'];
}

if(isset($_GET['records_per_page']) && !empty($_GET['records_per_page'])){
    $records_per_page = (int)$_GET['records_per_page'];
}

 
// query products
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
    $stmt = $review->readPagingByCust($from_record_num, $records_per_page, $cust_id);
    $total_rows = $review->countCust($cust_id); 
} 
elseif (isset($_GET['prof_id'])) {
    $prof_id = $_GET['prof_id'];
    
    $stmt = $review->readPagingByProf($from_record_num, $records_per_page, $prof_id);
     $total_rows = $review->countProf($prof_id); 
    
    
}elseif (isset($_GET['agent_id'])) {
    $agent_id = $_GET['agent_id'];
    $stmt = $review->readPagingByAgent($from_record_num, $records_per_page, $agent_id);
    $total_rows = $review->countAgent($agent_id);
}
else {
    $stmt = $review->readPaging($from_record_num, $records_per_page);
    $total_rows = $review->count();
}

$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // products array
    $reviews_arr=array();
    $reviews_arr["records"]=array();
    $reviews_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $professionalName = $review->getProfessionalNameByID($professional_id);
        $customerName = $review->getCustomerNameByID($customer_id);
        
        if(@$category_id){
            $categoryN = $review->getCategoryByID($category_id);
            $categoryName = $categoryN['title'];
            
        }else{
            $categoryName = "";
        }
        
 
        $review_item=array(
            "id" => $id,
            "prof_member_id" => $professional_id,
            "prof_member_name" => $professionalName,
            "cust_member_id" => $customer_id,
            "cust_member_name" => $customerName,
            "appointment_id" => $appointment_id,
            "job_title" => $job_title,
            "quality" => $quality,
            "reliability" => $reliability,
            "cost" => $cost,
            "schedule" => $schedule,
            "behaviour" => $behaviour,
            "cleanliness" => $cleanliness,
            "comment" => $comment,
            "professional_comment" => $professional_comment,
            "category_name" => $categoryName,
            "created" => $created,
        );
        if(@$category_id){
           $review_item['category_id'] = $category_id; 
        }else{
            $review_item['category_id'] ="";
        }
        array_push($reviews_arr["records"], $review_item);
    }
 
 
    // include paging
    
    $page_url="{$home_url}review/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $reviews_arr["paging"]=$paging;
 
    echo json_encode($reviews_arr);
}
 
else{
    echo json_encode(
        array("message" => "No reviews found.")
    );
}
?>