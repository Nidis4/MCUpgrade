<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';
error_reporting(0);
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);

if(isset($_POST['apistatus']))
{
	$apistatus = $_POST["apistatus"];
	$json = json_decode($apistatus, true);
	$uuid = $json['uuid'];
	$status = $json['status'];
	$user_input = $json['user_input'];
	$row_int_res_failure = $Calls->CheckuuidForAppointmentsExist($uuid);
	if($row_int_res_failure !== 0){
		if($row_int_res_failure['viewed_remainder_status'] =='failure'){
			$Calls->UpdateCallFailureAppointments($uuid,$status);
		}
		else{
			if($status =='success'){
				if (strpos($user_input, '2') !== false) {

					$Calls->AppointmentsRjectToCall($row_int_res_failure['id'],$uuid);
				}
			}
			else{
				$Calls->UpdateCallFailureElseAppointments($uuid,$status);
			}
		}
	}
	$log = $log.date("F j, Y, g:i a")." ".$apistatus.PHP_EOL;

	file_put_contents('/tmp/log_apistatus_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
}
?>
OK