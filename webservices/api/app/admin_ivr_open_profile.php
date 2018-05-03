<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);

$calldate = date("Y-m-d");
if (isset($_REQUEST['admin_email'])) {
	$sip_numberold = $Calls->GetSIPNumberForCall($_REQUEST['admin_email']);
	$agent_id =$_REQUEST['admin_email'];
	$sip_number = substr($sip_numberold, 1);
	if ($sip_number !='') {
		$call_answered_res = $Calls->GetCallAnsweredForAdminProfile($sip_number);
		if($call_answered_res != 0){
			
			$call_answered_mobile = $call_answered_res['from_call'];
			$uuid = $call_answered_res['uuid'];
			$call_duration = $call_answered_res['call_duration'];
			$rconrding = 'http://recordmcr.eu/webservice/ivr_recording/'.$uuid.'.wav';
			
			$CREATED_DATE = date("Y-m-d H:i:s");
			$AppointmentCheck = $Calls->AppointmentCheck($call_answered_mobile);
			
			$ProfessionalsCheck = $Calls->ProfessionalsCheck($call_answered_mobile);
			$Calls->UpdateCallAnsweredAdminProfile($sip_number);
			if($AppointmentCheck !== 0){

				$url = 'https://upgrade.myconstructor.gr/platform/customer.php?id='.$AppointmentCheck['id'];
				$about ='Customer';
				$name = $AppointmentCheck['first_name'];
				$surname = $AppointmentCheck['last_name'];
				$Calls->InsertCallFromOpenProfile($AppointmentCheck['id'],$about,$calldate,$call_duration,$agent_id,$name,$surname,$call_answered_mobile,$rconrding,$uuid);
			}
			elseif($ProfessionalsCheck !== 0){
				
				$url = 'https://upgrade.myconstructor.gr/platform/professional.php?id='.$ProfessionalsCheck['id'];
				$about ='Proffesional';
				$name = $ProfessionalsCheck['first_name'];
				$surname = $ProfessionalsCheck['last_name'];
				$Calls->InsertCallFromOpenProfile($ProfessionalsCheck['id'],$about,$calldate,$call_duration,$agent_id,$name,$surname,$call_answered_mobile,$rconrding,$uuid);
			}
			else{
				
				$about ='Other';
				$surname = '('.$CREATED_DATE.')';
				$callId = $Calls->InsertCallFromOpenProfile('0',$about,$calldate,$call_duration,$agent_id,$call_answered_mobile,$surname,$call_answered_mobile,$rconrding,$uuid);
				$url = 'https://upgrade.myconstructor.gr/platform/call.php?id='.$callId;
			}
			echo $url;
			
		}
		
	}
}
?>