<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'AppointmentClass.php';

// instantiate database and product object

$database = new Database();
$db = $database->getConnection();

// initialize object
$GetAppointmentClass = new AppointmentClass($db);

// get keywords
if(isset($_REQUEST['id']) && isset($_REQUEST['date']) && isset($_REQUEST['time']) && isset($_REQUEST['date_old']) && isset($_REQUEST['time_old']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";
    $id=isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";
    $date=isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
    $time=isset($_REQUEST["time"]) ? $_REQUEST["time"] : "";
    $date_old=isset($_REQUEST["date_old"]) ? $_REQUEST["date_old"] : "";
    $time_old=isset($_REQUEST["time_old"]) ? $_REQUEST["time_old"] : "";

   
    
    if($id != '' && $date !='' && $time !='' && $date_old !='' && $time_old !='' ){
   
        $stmt = $GetAppointmentClass->UpdateDateTimeOfAppoinment($id,$date,$time,$date_old,$time_old);
       
        $row_array['status'] = "1";
        $row_array['msg'] = "sucess";
        
       /* $row_array['member_id'] = $member_id;
        $row_array['status'] = $free_busy_status;
       */
        echo json_encode($row_array);
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "member id not found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter All parameter";
    echo json_encode($row_array);
}
?>