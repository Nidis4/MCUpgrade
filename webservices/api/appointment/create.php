<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/appointment.php';
include_once '../objects/category.php';
include_once '../objects/viber.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$appointment = new Appointment($db);
 

 $prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();
 $status = isset($_POST['status']) ? $_POST['status'] : die();
 $cust_id = isset($_POST['cust_id']) ? $_POST['cust_id'] : die();
 $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : die();
 $application_id = isset($_POST['application_id']) ? $_POST['application_id'] : die();
 $county_id = isset($_POST['county_id']) ? $_POST['county_id'] : die();
 $date = isset($_POST['date']) ? $_POST['date'] : die();
 $time = isset($_POST['time']) ? $_POST['time'] : die();
 $address = isset($_POST['address']) ? $_POST['address'] : die();
 $delivery_address = isset($_POST['delivery_address']) ? $_POST['delivery_address'] : "";
 $budget = isset($_POST['budget']) ? $_POST['budget'] : die();
 $commision = isset($_POST['commision']) ? $_POST['commision'] : die();
 $agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : die();
 $comment = isset($_POST['comment']) ? $_POST['comment'] : die();
 $professionalsms = isset($_POST['professionalsms']) ? $_POST['professionalsms'] : die();
 $employersms = isset($_POST['employersms']) ? $_POST['employersms'] : die();
 $customer_mobile = isset($_POST['mobile']) ? $_POST['mobile'] : die();
 $landline = isset($_POST['phone']) ? $_POST['phone'] : "";
 $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : die();
 $surname = isset($_POST['surname']) ? $_POST['surname'] : die();



// query products
$stmt = $appointment->create($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address,  $budget, $commision, $agent_id, $comment, $status, $delivery_address);

// Check Professional default SMS

$procheck = $appointment->checkprofsms($prof_id);


//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){ 
    /*echo json_encode(
        array("message" => "Appointment updated successfully.")
    );*/

    if(@$employersms){
	    	// initialize object
    		$customer_mobile = '6940589493';

			$category = new Category($db);
			$category->id = $category_id;
			$cat = $category->readOne();			
			$arrtime = explode("-", $time, 2);
			$FFtime = $arrtime[0];
			$FLtime = date('H:i', strtotime($FFtime)+7200);
			//$Ftime = $FFtime.'-'.$FLtime;
			if(($category_id == '57') || ($category_id == '106')){
				$Ftime = $FFtime.'-'.$FLtime;
			}else{
				$Ftime = $FFtime;
			}
			$adate = date_create($date);
			$fdate = date_format($adate, 'd-m-y');
			$fcname = $category->title_greek;
			$smsTexts = implode(' - ', [
				'Ραντεβού για '.$fcname,
				'στις '.$Ftime.' ' .$fdate.'.',
				$address,
				'Γραμμή εξυπηρέτησης πελατών 2103009325'
			]);

			// Viber Connection			
			$viber = new Viber($db);
			
			$viber->send($customer_mobile, $smsTexts);

			// Reminder to Customer before 24 hours
			$adate1 = date_create($date);
			$fdate1 = date_format($adate1, 'Y-m-d');

			$d1 = new DateTime($fdate1." ".$FFtime.":00"); 
			$d2 = new DateTime(date("Y-m-d H:i:s"));
			$interval = $d1->diff($d2);
			$d_hours = ($interval->days * 24) + $interval->h;
			if($d_hours >= 54){
				

				$smsTexts = implode(' - ', [
					'Υπενθύμιση: Ραντεβού για '.$fcname,
					'στις '.$Ftime.' ' .$fdate.'.',
					$address,
					'Γραμμή εξυπηρέτησης πελατών 2103009325'
				]);
				$senddate = date("Ymd",strtotime($fdate1." ".$FFtime.":00 -2Hours"));
				$sendtime = date("Hi",strtotime($fdate1." ".$FFtime.":00 -2Hours"));
				$viber->send($customer_mobile, $smsTexts, $senddate, $sendtime );

			}
			//die;




	}
	if(@$professionalsms || @$procheck){
	    	// initialize object
			$professional_mobile = '6940589493';
			
			$defaultTimezone = date_default_timezone_get();
			date_default_timezone_set('Europe/Athens');

			$times = explode('-', $time);
			$dateTstampStart = strtotime($date . ' ' . $times[0]);
			$dateTstampEnd = strtotime($date . ' ' . $times[1]);
			$smsDate = date('l d/m/y', $dateTstampStart);			
			$smsText = implode(' - ', [
						$smsDate,
						$times[0],
						$address,
						$budget . '€',
						$firstname . ' ' . $surname,
						$professional_mobile,
						$landline,
						$comment
					]);

			// Viber Connection			
			$viber = new Viber($db);			
			$viber->send($customer_mobile, $smsTexts);

	}

    echo $stmt;
}
 
else{
    echo json_encode(
        array("message" => "No Appointment found.")
    );
}
?>