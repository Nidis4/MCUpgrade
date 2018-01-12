<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/appointment.php';
 
// utilities
$utilities = new Utilities();
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$appointment = new Appointment($db);
 
// query products
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
    $stmt = $appointment->readPagingByCust($from_record_num, $records_per_page, $cust_id);
} else {
    $stmt = $appointment->readPaging($from_record_num, $records_per_page);
}
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $appointments_arr=array();
    $appointments_arr["records"]=array();
    $appointments_arr["paging"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $professionalName = $appointment->getProfessionalNameByID($prof_member_id);
        $customerName = $appointment->getCustomerNameByID($cust_member_id);
 
        $appointment_item=array(
            "id" => $id,
            "prof_member_id" => $prof_member_id,
            "prof_member_name" => $professionalName,
            "cust_member_id" => $cust_member_id,
            "cust_member_name" => $customerName,
            "application_id" => $application_id,
            "date" => $date,
            "time" => $time,
            "address" => $address,
            "budget" => $budget,
            "commision" => $commision,
            "agent_id" => $agent_id,
            "comment" => $comment,
            "sms" => $sms,
            "sms_log_id" => $sms_log_id,
            "googleEventId" => $googleEventId,
            "datetimeCreated" => $datetimeCreated,
            "datetimeStatusUpdated" => $datetimeStatusUpdated,
            "sourceAppointmentId" => $sourceAppointmentId,
            "status" => $status,
            "cancelComment" => $cancelComment
        );
 
        array_push($appointments_arr["records"], $appointment_item);
    }
 
 
    // include paging
    $total_rows=$appointment->count();
    $page_url="{$home_url}appointment/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $appointments_arr["paging"]=$paging;
 
    echo json_encode($appointments_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>