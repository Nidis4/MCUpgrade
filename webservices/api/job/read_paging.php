<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/job.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$job = new Job($db);


// query products
$stmt = $job->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $jobs_arr=array();
    $jobs_arr["records"]=array();
    $jobs_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $job_item=array(
            "id" => $id,
            "customer_id" => $customer_id,
            "category_id" => $category_id,
            "email" => $email,
            "title" => $title,
            "budget" => $budget,
            "offers" => $offers,
            "offer_balance" => $offer_balance,
            "questions" => $questions,
            "phone" => $phone,
            "datetimeCreated" => $datetimeCreated,
            "first_name" => $first_name,
            "last_name" => $last_name,
        );
 
        array_push($jobs_arr["records"], $job_item);
    }
 
 
    // include paging
    $total_rows = $job->count();
    $page_url = "{$home_url}job/read_paging.php?";
    $paging = $utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $jobs_arr["paging"]=$paging;
 
    echo json_encode($jobs_arr);
}
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>