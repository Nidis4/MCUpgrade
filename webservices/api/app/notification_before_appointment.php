<?php
//  /home/upgrademy/public_html/webservices/api/app/notification_before_appointment.php

include_once '../config/database.php';
include_once 'AppointmentClass.php';

$database = new Database();
$db = $database->getConnection();

$AppointmentCreateNotification = new AppointmentClass($db);
$GetMember = $AppointmentCreateNotification->NotificationBeforeFourtyAppointmentNotViewed();
$num = $GetMember->rowCount();
if($num>0){
	$CurrentTime = $AppointmentCreateNotification->GreeceCurrentTime();
	$row = $GetMember->fetch(PDO::FETCH_ASSOC);
	$appointments_date = $row['date'];
	$appointments_time = $row['time'];
	$arrtime = explode("-", $appointments_time, 2);
	$FFtime = $arrtime[0].':00';
	$appointments_DateTime = $appointments_date.' '.$FFtime;
	$minute = $AppointmentCreateNotification->TimeDiffrenceInMinute($CurrentTime,$appointments_DateTime);
	
	if ($minute >= '1' && $minute <= '45') 
    {
    	$GetProfessionalsDeviceTokenv = $AppointmentCreateNotification->GetProfessionalsDeviceToken($row['prof_member_id']);
		$numGetProfessionalsDeviceTokenv = $GetProfessionalsDeviceTokenv->rowCount();
		if($numGetProfessionalsDeviceTokenv>0){
			$AppointmentCreateNotification->UpdateNotificationBeforeFourtyAppointmentNotViewed($row['id']);
			$rows = $GetProfessionalsDeviceTokenv->fetch(PDO::FETCH_ASSOC);
			$appointment_id =$row['id'];
			$notification ='Υπενθύμιση: Ραντεβού σε 40';
			$message = array("message" => $notification ,"appointment_id" => $appointment_id ,"tag" => "0");

			$RegId = $rows['device_token'];
			$device_status =$rows['device_status'];
			if($device_status =='2'){
				
				$pushStatusAndroid = $AppointmentCreateNotification->sendPushNotificationToGCM($RegId,$message);
			}
			if($device_status =='1'){
				$messageA = $notification;
				$tag = '0';
				$pushStatusIos = $AppointmentCreateNotification->IosSendPushNotification($RegId,$messageA,$appointment_id,$tag);
			}
		}
    }
	
}

?>