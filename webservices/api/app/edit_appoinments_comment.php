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
$GetCommissionClass = new AppointmentClass($db);

// get keywords
if(isset($_REQUEST['appointment_id']) && isset($_REQUEST['comment']))
{
    $appointment_id=isset($_REQUEST["appointment_id"]) ? $_REQUEST["appointment_id"] : "";
    $comment=isset($_REQUEST["comment"]) ? $_REQUEST["comment"] : "";

   
    
    if($appointment_id != ''){
   
        $stmt = $GetCommissionClass->UpdateCommentOfAppoinmentd($comment,$appointment_id);
       
        $row_array['status'] = "1";
        $row_array['msg'] = "sucess";
        $row_array['comment'] = $comment;
       
        echo json_encode($row_array);
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "comment not found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>