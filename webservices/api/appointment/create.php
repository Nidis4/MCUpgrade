<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/appointment.php';
include_once '../objects/category.php';
include_once '../objects/viber.php';
include_once '../../../constants.php';
 
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
 $email = isset($_POST['email']) ? $_POST['email'] : "";



// query products
$stmt = $appointment->create($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address,  $budget, $commision, $agent_id, $comment, $status, $delivery_address);

// Check Professional default SMS

$procheck = $appointment->checkprofsms($prof_id);


// check if more than 0 record found
if($stmt){ 
    /*echo json_encode(
        array("message" => "Appointment updated successfully.")
    );*/

    // For Application Title
    // include_once '../objects/application.php';
    // $application = new Application($db);
    // $application->id = $application_id;
    // $appointment_stmt = $application->readOne();
    // $app_row = $appointment_stmt->fetch(PDO::FETCH_ASSOC);
    // $application_name = $app_row['title_greek'];


    // For Professional Data
    include_once '../objects/professional.php';
    $professional = new Professional($db);
    $professional->id = $prof_id;
    $professional_stmt = $professional->readOne();
    $professional_surname = $professional->last_name;



    /// Create invoice for Customer
    if(@$_POST['sendinvoice']){
    	include_once '../objects/payment.php';
    	$payment = new Payment($db);
    	date_default_timezone_set('Europe/Athens');
		$Pdatetimeadded = date("Y-m-d H:i:s");

    	$datetime_added  = $Pdatetimeadded;

    	$payment->saveCustomerInvoice($cust_id, $category_id, $budget, $agent_id, $comment, "Cash", "", $datetime_added,'1');
    }

    $customer_mobile     = '6940589493';
    $professional_mobile = '6940589493';
    $professional_email  = $professional->email;

    $adate1 = date_create($date);
	$smsDate = date_format($adate1, 'd/m');
    //$smsDate = date('l d/m/y', strtotime($date));


	$stime = explode('-', $time);


    // Send Email to Prof
    // $body    = file_get_contents("../../../emails/header.php");
    // $body   .= file_get_contents("../../../emails/create_appointment_prof.php");
    // $body   .= file_get_contents("../../../emails/footer.php");
    // $message = str_replace('{{URL}}', SITE_URL, $body );
    // //$message = str_replace('{{SURNAME}}', $professional_surname, $message );
    // //$message = str_replace('{{APPLICATION_NAME}}', $application_name, $message );
    // $message = str_replace('{{CUSTOMER_NAME}}', $firstname." ".$surname, $message );
    // $message = str_replace('{{ADDRESS}}', $address, $message );
    // $message = str_replace('{{DELIVERY_ADDRESS}}', $delivery_address, $message );
    // if($category_id == '103'){
    // 	$message = str_replace('{{PHONE}}', '-', $message );
    // 	$message = str_replace('{{EMAIL}}', '-', $message ); 
    // }else{
   	// 	$message = str_replace('{{PHONE}}', $customer_mobile, $message );
    // 	$message = str_replace('{{EMAIL}}', $email, $message ); 	
    // }
   
    // $message = str_replace('{{COST}}', $budget, $message );
    // $message = str_replace('{{COMMENTS}}', $comment, $message );

    $to = $professional_email;
    
    $subject ="Ραντεβού: ". $smsDate .'-'. $stime[0];
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    //$headers .= 'From: <webmaster@example.com>' . "\r\n";
    //$headers .= 'Cc: myboss@example.com' . "\r\n";
    //echo $message;
    $defaultTimezone = date_default_timezone_get();
	date_default_timezone_set('Europe/Athens');

	$times = explode('-', $time);
	$dateTstampStart = strtotime($date . ' ' . $times[0]);
	$dateTstampEnd = strtotime($date . ' ' . $times[1]);
	$smsDate = date('l d/m/y', $dateTstampStart);	

    if( $category_id == '103'){
		$message = implode(' - ', [
				$smsDate,
				$times[0],
				$address,
				$budget . '€',
				$firstname . ' ' . $surname,
				$landline,
				$comment
			]);
	}else{
		$message = implode(' - ', [
				$smsDate,
				$times[0],
				$address,
				$budget . '€',
				$firstname . ' ' . $surname,
				$customer_mobile,
				$landline,
				$comment
			]);	
	}

    mail($to,$subject,$message,$headers);

    if(@$employersms){
	    	// initialize object
    		

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
			if($d_hours >= 16){
				

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
			
			
			$defaultTimezone = date_default_timezone_get();
			date_default_timezone_set('Europe/Athens');

			$times = explode('-', $time);
			$dateTstampStart = strtotime($date . ' ' . $times[0]);
			$dateTstampEnd = strtotime($date . ' ' . $times[1]);
			$smsDate = date('l d/m/y', $dateTstampStart);	

			if( $category_id == '103'){
				$smsText = implode(' - ', [
						$smsDate,
						$times[0],
						$address,
						$budget . '€',
						$firstname . ' ' . $surname,
						$landline,
						$comment
					]);
			}else{
				$smsText = implode(' - ', [
						$smsDate,
						$times[0],
						$address,
						$budget . '€',
						$firstname . ' ' . $surname,
						$customer_mobile,
						$landline,
						$comment
					]);	
			}	
			

			// Viber Connection			
			$viber = new Viber($db);			
			$viber->send($professional_mobile, $smsText);

	}

    echo $stmt;
}
 
else{
    echo json_encode(
        array("message" => "No Appointment found.")
    );
}
?>