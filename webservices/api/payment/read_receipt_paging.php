<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/payment.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$invoice = new Payment($db);
 
// query products

$stmt = $invoice->readReceiptPaging($from_record_num, $records_per_page);

$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $invoices_arr=array();
    $invoices_arr["records"] = array();
    $invoices_arr["paging"] = array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $payment_item=array(
            "payment_id" => $payment_id,
            "professional_id" => $professional_id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "cfirst_name" => $cfirst_name,
            "clast_name" => $clast_name,
            "sent_email" => $sent_email,
            "datetime_added" => $datetime_added,
            "receipt_no" => $receipt_no,
            "comment" => $comment,
            "amount" => $amount,
            "status" => $status,
            "description" => $description,
        );
        
        array_push($invoices_arr["records"], $payment_item);
    }
 
 
    // include paging
    $total_rows = $invoice->receiptcount();
    $page_url = "{$home_url}payment/read_receipt_paging.php?";
    $paging = $utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $invoices_arr["paging"] = $paging;
    $invoices_arr["message"] = "";
 
    echo json_encode($invoices_arr);
}
 
else{
    echo json_encode(
        array("message" => "No Payment found.")
    );
}
?>