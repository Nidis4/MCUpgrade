<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'ProfessionalClass.php';

// instantiate database and product object

$database = new Database();
$db = $database->getConnection();

// initialize object
$GetProfessionalClass = new ProfessionalClass($db);

// get keywords
if(isset($_REQUEST['member_id']) && isset($_REQUEST['free_busy_status']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";
    $free_busy_status=isset($_REQUEST["free_busy_status"]) ? $_REQUEST["free_busy_status"] : "";

   
    
    if($member_id != ''){
   
        $stmt = $GetProfessionalClass->FreeBusyStatus($member_id,$free_busy_status);
       
        $row_array['status'] = "1";
        $row_array['msg'] = "sucess";
        
       /* $row_array['member_id'] = $member_id;
        $row_array['status'] = $free_busy_status;
       */
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