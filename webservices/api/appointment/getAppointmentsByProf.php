<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/appointment.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$appointment = new Appointment($db);

// set ID property of product to be edited
$appointment->prof_member_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();
$appointment->status = isset($_POST['status']) ? $_POST['status'] : "";

// create array
$stmt = $appointment->getAppointnmentsByProf($appointment->prof_member_id, $appointment->status);

$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // products array
    $appointments_arr=array();
    $appointments_arr["appointments"]=array();
 
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
            "country" => "Greece",
            "category_name" => $categoryName,
        );
        if(@$category_id){
           $appointment_item['category_id'] = $category_id; 
        }else{
            $appointment_item['category_id'] ="";
        }
        array_push($appointments_arr["appointments"], $appointment_item);
    }
 
 
    echo json_encode($appointments_arr);
}
 
else{
    echo json_encode(
        array("message" => "No appointments found.")
    );
}
?>