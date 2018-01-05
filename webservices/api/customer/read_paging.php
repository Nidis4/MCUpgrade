<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/customer.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$customer = new Customer($db);
 
// query products
$stmt = $customer->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $customers_arr=array();
    $customers_arr["records"]=array();
    $customers_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $customer_item=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "sex" => $sex,
            "address" => $address,
            "phone" => $phone,
            "mobile" => $mobile,
            "email" => $email
        );
 
        array_push($customers_arr["records"], $customer_item);
    }
 
 
    // include paging
    $total_rows=$customer->count();
    $page_url="{$home_url}customer/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $customers_arr["paging"]=$paging;
 
    echo json_encode($customers_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>