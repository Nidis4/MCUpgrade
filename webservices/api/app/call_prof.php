<?php
// include database and object files
include_once '../config/database.php';
include_once 'CallClass.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$Calls = new CallClass($db);
$GroupList = array();
$uuid = $_REQUEST['uuid'];
$strfrom = $_REQUEST['from'];
$newFrom = substr($strfrom, 0, 2);
if($newFrom =='30'){
  $from = substr($strfrom, 2);
}
else{
  $from = $strfrom;
}
 $stmt = $Calls->CheckProfessionalForCall($from);
 $num = $stmt->rowCount();
 if($num>0){
	$prof_row = $stmt->fetch(PDO::FETCH_ASSOC);
	$member_id = $prof_row['professional_id'];
	$GetProfessionalLastnameV =  $Calls->GetProfessionalLastname($member_id);
	$stmtCheckProfessionalAppointment = $Calls->CheckProfessionalAppointment($member_id);
	$numstmtCheckProfessionalAppointment = $stmtCheckProfessionalAppointment->rowCount();
	$professional_surname = rawurlencode($GetProfessionalLastnameV['last_name']);
	$professional_phone = rawurlencode('30'.$prof_row['mobile']);
	if($numstmtCheckProfessionalAppointment>0){
		$row_int = $stmtCheckProfessionalAppointment->fetch(PDO::FETCH_ASSOC);
		$dateInGreek =  $Calls->GetMonthGreek($row_int['date']);
		$DayInGreek =  $Calls->GetDayNameGreek($row_int['date']);
		$appointment_date = rawurlencode($dateInGreek);
    	$appointment_day = rawurlencode($DayInGreek);

		$atime = $row_int['time'];
		$arrtime = explode("-", $atime, 2);
		$FFtime = $arrtime[0];
		$arrtimes = explode(":", $FFtime, 2);
		$startTimeHours = $arrtimes[0];
		$startTimeMinuts = $arrtimes[1];
		$newTimeFormat = "στις ".$startTimeHours." και ".$startTimeMinuts;
		$appointment_time = rawurlencode($newTimeFormat);

		$appointment_category = rawurlencode($row_int['name_greek']);
	    $customer_address = rawurlencode($row_int['address']);
	    $customer_name = rawurlencode($row_int['first_name']);
	    $customer_surname = rawurlencode($row_int['last_name']);

	    $customer_Mobile = (string)$row_int['mobile'];
    	$customer_Mobile_arr = str_split($customer_Mobile, "1");
    	$customer_Mobile_Format = implode(", ", $customer_Mobile_arr);
    	$customer_phone = rawurlencode($customer_Mobile_Format);

    	$customer_land_line = (string)$row_int['phone'];
	    $customer_land_line_arr = str_split($customer_land_line, "1");
	    $customer_land_line_Format = implode(", ", $customer_land_line_arr);
	    $customer_landline = rawurlencode($customer_land_line_Format);
	    $comments = rawurlencode($row_int['comment']);

    	$data_string = '{"group_list":["302103008270"],"professional_phone":"'.$professional_phone.'","professional_surname":"'.$professional_surname.'","appointment_date":"'.$appointment_date.'","appointment_day":"'.$appointment_day.'","appointment_time":"'.$appointment_time.'","appointment_category":"'.$appointment_category.'","customer_address":"'.$customer_address.'","customer_name":"'.$customer_name.'","customer_surname":"'.$customer_surname.'","customer_phone":"'.$customer_phone.'","customer_landline":"'.$customer_landline.'","comments":"'.$comments.'"}';
		
	}
	else{
		$data_string = '{"group_list":["302103008270"],"professional_phone":"'.$professional_phone.'","professional_surname":"'.$professional_surname.'","appointment_date":"","appointment_day":"","appointment_time":"","appointment_category":"","customer_address":"","customer_name":"","customer_surname":"","customer_phone":"","customer_landline":"","comments":""}';
	}

 }
 else{
 	$data_string = '{"group_list":["302103008270"],"professional_phone":"","professional_surname":"","appointment_date":"","appointment_day":"","appointment_time":"","appointment_category":"","customer_address":"","customer_name":"","customer_surname":"","customer_phone":"","customer_landline":"","comments":""}';
 }
echo $data_string;