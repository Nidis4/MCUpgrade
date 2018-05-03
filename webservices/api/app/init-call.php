<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);

$row_int_res = $Calls->GetInitCallData();
if($row_int_res !='0' || $row_int_res !=''){
	
	$appointments_date_int = $row_int_res['date'];
	$appointments_time_int = $row_int_res['time'];
	$arrtime_int = explode("-", $appointments_time_int, 2);
	$FFtime_int = $arrtime_int[0].':00';
	$appointments_DateTime_int= $appointments_date_int.' '.$FFtime_int;
	$HOUR = 'HOUR';
	$GetAppointmentsCallHoursV = $Calls->GetAppointmentsCallHours($HOUR,$appointments_DateTime_int);

	$CREATED_DATE_int = $GetAppointmentsCallHoursV['cDate'];
	$HOURS = $GetAppointmentsCallHoursV['HOURS'];
	
	if ($HOURS <= '24') 
    {
    	$date=date_create($CREATED_DATE_int);
	    $Current_time_hours = date_format($date,"H");
	    $check_day = date_format($date, 'D'); //Sat
	    if($check_day =='Sat'){
	      	if($Current_time_hours <= '21' && $Current_time_hours >= '9' ){
	        	$Calls->InitCallMainFunction($row_int_res['id']);
	      	}
	    }
	    else{
	      	if($Current_time_hours <= '21' && $Current_time_hours >= '9' ){
	        	$Calls->InitCallMainFunction($row_int_res['id']);
	      	}
	    }
    }
}

$row_int_res_failure = $Calls->GetAppoinmentIntiFailureCall();

if($row_int_res_failure !='0' || $row_int_res_failure !=''){
	$MINUTE = 'MINUTE';
	$appointments_DateTime_int_failure= $row_int_res_failure['viewed_remainder_status_date_time'];
	$GetAppointmentsCallMINUTEsV = $Calls->GetAppointmentsCallHours($MINUTE,$appointments_DateTime_int_failure);
	
	$CREATED_DATE_int_failure = $GetAppointmentsCallMINUTEsV['cDate'];
	$MINUTES_failure = $GetAppointmentsCallMINUTEsV['HOURS'];
	if ($MINUTES_failure >= '5') 
    {
		$date_failure=date_create($CREATED_DATE_int_failure);
		$Current_time_hours_failure = date_format($date_failure,"H");
		$check_day_failure = date_format($date_failure, 'D'); //Sat
		if($check_day_failure =='Sat'){
			if($Current_time_hours_failure <= '21' && $Current_time_hours_failure >= '9' ){
				$Calls->InitCallMainFunction($row_int_res_failure['id']);
			}
		}
		else{
			if($Current_time_hours_failure <= '21' && $Current_time_hours_failure >= '9' ){
				$Calls->InitCallMainFunction($row_int_res_failure['id']);
			}
		}
    }
}

?>