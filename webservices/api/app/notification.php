<?php
// required headers
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'AppointmentClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$AppointmentCreateNotification = new AppointmentClass($db);
$GetMember = $AppointmentCreateNotification->GetNewProfessionalsAppointment();
$num = $GetMember->rowCount();
if($num>0){
	$row = $GetMember->fetch(PDO::FETCH_ASSOC);
	extract($row);
	$GetProfessionalsDeviceTokenv = $AppointmentCreateNotification->GetProfessionalsDeviceToken($prof_member_id);
	$numGetProfessionalsDeviceTokenv = $GetProfessionalsDeviceTokenv->rowCount();
	if($numGetProfessionalsDeviceTokenv>0){
		$rows = $GetProfessionalsDeviceTokenv->fetch(PDO::FETCH_ASSOC);
		extract($rows);
		$appointment_id =$row['id'];
		$UpdateNewAppointmentSentStatusV = $AppointmentCreateNotification->UpdateNewAppointmentSentStatus($appointment_id);
		$notification ='Νέο ραντεβού';
		$message = array("message" => $notification ,"appointment_id" => $appointment_id ,"tag" => "0");
		if($device_status =='2'){

			$pushStatusAndroid = $AppointmentCreateNotification->sendPushNotificationToGCM($device_token,$message);

		}
		if($device_status =='1'){
			$messageA = $notification;
			$tag = '0';
			$pushStatusIos = $AppointmentCreateNotification->IosSendPushNotification($device_token,$messageA,$appointment_id,$tag);
		}
	}

}

//cancle appo

$GetMemberCancle = $AppointmentCreateNotification->GetCancleProfessionalsAppointment();
$numC = $GetMemberCancle->rowCount();
if($numC>0){
	$rowC = $GetMemberCancle->fetch(PDO::FETCH_ASSOC);
	extract($rowC);
	
	$GetProfessionalsDeviceTokenvc = $AppointmentCreateNotification->GetProfessionalsDeviceToken($rowC['prof_member_id']);
	$numGetProfessionalsDeviceTokenvc = $GetProfessionalsDeviceTokenvc->rowCount();
	if($numGetProfessionalsDeviceTokenvc>0){
		$rowsc = $GetProfessionalsDeviceTokenvc->fetch(PDO::FETCH_ASSOC);
		extract($rowsc);
		$appointment_idc =$rowC['id'];
		$UpdateNewAppointmentSentStatusVC = $AppointmentCreateNotification->UpdateCancleAppointmentSentStatus($appointment_idc);
		$date = date_create($rowC['date']);
		$dateNew = date_format($date, 'd/m');
		$time =$rowC['time'];
		$arrtime = explode("-", $time, 2);
		$FFtime = $arrtime[0];
		$address =$rowC['address'];
		$notificationc ='Ακύρωση ραντεβού : '.$FFtime.' '.$dateNew.' '. $address;
		$messagec = array("message" => $notificationc ,"appointment_id" => $appointment_idc ,"tag" => "1");
		$RegIdc = $device_token;
		if($device_status =='2'){
			$pushStatusAndroid = $AppointmentCreateNotification->sendPushNotificationToGCM($RegIdc,$messagec);
		}
		if($device_status =='1'){
			$messageA = $notificationc;
			$tag = '0';
			
			$pushStatusIos = $AppointmentCreateNotification->IosSendPushNotification($RegIdc,$messageA,$appointment_idc,$tag);
		}
	}
}
// get keywords

?>