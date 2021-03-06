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

if(isset($_GET['from_record_num']) && !empty($_GET['from_record_num'])){
    $from_record_num = (int)$_GET['from_record_num'];
}

if(isset($_GET['records_per_page']) && !empty($_GET['records_per_page'])){
    $records_per_page = (int)$_GET['records_per_page'];
}

 
// query products
if (isset($_GET['cust_id'])) {
    $cust_id = $_GET['cust_id'];
    $stmt = $appointment->readPagingOffersByCust($from_record_num, $records_per_page, $cust_id);
    $total_rows = $appointment->countOffersCust($cust_id); 
} 
elseif (isset($_GET['prof_id'])) {
    $prof_id = $_GET['prof_id'];
    if(@$_GET['latest']){
       $stmt = $appointment->readPagingByProfLatest($from_record_num,$records_per_page, $prof_id);
       $total_rows = $appointment->countProfLatest($prof_id);
    }else{
       $stmt = $appointment->readPagingByProf($from_record_num, $records_per_page, $prof_id);
       $total_rows = $appointment->countProf($prof_id); 
    }
    
}elseif (isset($_GET['agent_id'])) {
    $agent_id = $_GET['agent_id'];
    $stmt = $appointment->readPagingByAgent($from_record_num, $records_per_page, $agent_id);
    $total_rows = $appointment->countAgent($agent_id);
}
else {
    $stmt = $appointment->readPagingOffers($from_record_num, $records_per_page);
    $total_rows = $appointment->countOffers();
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
        $customerMobile = $appointment->getCustomerMobileByID($cust_member_id);
        $agentName = $appointment->getAgentNameByID($agent_id);
        if(@$category_id){
            $categoryN = $appointment->getCategoryByID($category_id);
            $categoryName = $categoryN['title'];
            
        }else{
            $categoryName = "";
        }
        
 
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
            "datetimeCreated" => $datetimeCreated,
            "datetimeStatusUpdated" => $datetimeStatusUpdated,
            "sourceAppointmentId" => $sourceAppointmentId,
            "status" => $status,
            "cancelReason" => $cancelReason,
            "cancelComment" => $cancelComment,
            "agent_name" => $agentName,
            "mobile" => $customerMobile,
            "category_name" => $categoryName,
            "viewed" => $viewed,
            "viewed_datetime" => $viewed_datetime,
        );
        if(@$category_id){
           $appointment_item['category_id'] = $category_id; 
        }else{
            $appointment_item['category_id'] ="";
        }
        array_push($appointments_arr["records"], $appointment_item);
    }
 
 
    // include paging
    
    $page_url="{$home_url}appointment/read_paging_offers.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $appointments_arr["paging"]=$paging;
 
    echo json_encode($appointments_arr);
}
 
else{
    echo json_encode(
        array("message" => "No offers found.")
    );
}
?>