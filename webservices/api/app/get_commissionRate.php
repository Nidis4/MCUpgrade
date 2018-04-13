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
if(isset($_REQUEST['appointment_id']) && isset($_REQUEST['budget']))
{
    $appointment_id=isset($_REQUEST["appointment_id"]) ? $_REQUEST["appointment_id"] : "";
    $budget=isset($_REQUEST["budget"]) ? $_REQUEST["budget"] : "";

    $commissionRate = $GetCommissionClass->GetCommission($appointment_id);
    
    if($commissionRate != ''){
        $commission = ($budget*$commissionRate)/100;
        $stmt = $GetCommissionClass->UpdateBudgetOfAppoinmentd($commission,$appointment_id,$budget);
       
        $row_array['status'] = "1";
        $row_array['budget'] = $budget;
        $row_array['commision'] = $commission;
        echo json_encode($row_array);
    }

    else{
        $row_array['status'] = "0";
        $row_array['msg'] = "Commission rate not found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>