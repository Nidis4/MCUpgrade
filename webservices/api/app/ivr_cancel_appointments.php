<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);
//header('Content-Type: application/json');
if(isset($_REQUEST['appoinments_id']) && isset($_REQUEST['cancelComment']))
{
	$appoinments_id=isset($_REQUEST["appoinments_id"]) ? $_REQUEST["appoinments_id"] : "";
	$cancelComment=isset($_REQUEST["cancelComment"]) ? $_REQUEST["cancelComment"] : "";
	$CheckAppoinmentExistV = $Calls->CheckAppoinmentExist($appoinments_id);
	if($CheckAppoinmentExistV !== 0){
		$prof_member_id = $CheckAppoinmentExistV['prof_member_id'];
		$date = $CheckAppoinmentExistV['date'];
		$time = $CheckAppoinmentExistV['time'];
		$Calls->DeleteBusySlotForCalendar($prof_member_id,$date,$time);
		$Calls->ChangeAppoinmentCancelStatus($appoinments_id,$cancelComment);
		$row_array['status'] = "1";
	}
	else{
		$row_array['status'] = "0";
    	$row_array['msg'] = "No appoinment found";
	}
}
else{
	$row_array['status'] = "0";
	$row_array['msg'] = "Please enter valid details";
}
echo json_encode($row_array);
?>