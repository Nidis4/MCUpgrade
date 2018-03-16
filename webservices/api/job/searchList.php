<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/job.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$job = new Job($db);
 
// get keywords
$title = isset($_GET["t"]) ? $_GET["t"] : "";
$email = isset($_GET["e"]) ? $_GET["e"] : "";
$name = isset($_GET["n"]) ? $_GET["n"] : "";
$surname = isset($_GET["s"]) ? $_GET["s"] : "";
 
// query products
$stmt = $job->searchList($title, $name, $surname, $email);
//$stmt = $customer->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $jobs_arr=array();
    //$products_arr["records"]=array();
 
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
 
        array_push($jobs_arr, $job_item);
    }
 
    echo json_encode($jobs_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Job found.")
    );
}
?>