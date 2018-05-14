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
 

 $cust_id = isset($_POST['cust_id']) ? $_POST['cust_id'] : fail();
 $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : fail();
 $application_id = isset($_POST['application_id']) ? $_POST['application_id'] : fail();
 $address = isset($_POST['address']) ? $_POST['address'] : fail();
 $budget = isset($_POST['budget']) ? $_POST['budget'] : fail();
 $county_id = isset($_POST['county_id']) ? $_POST['county_id'] : fail();
 $commision = isset($_POST['commision']) ? $_POST['commision'] : fail();
 $agent_id = isset($_POST['agent_id']) ? $_POST['agent_id'] : fail();
 $comment = isset($_POST['comment']) ? $_POST['comment'] : fail();
 $customer_mobile = isset($_POST['mobile']) ? $_POST['mobile'] : fail();
 $landline = isset($_POST['phone']) ? $_POST['phone'] : "";
 $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : fail();
 $surname = isset($_POST['surname']) ? $_POST['surname'] : fail();
 $status = isset($_POST['status']) ? $_POST['status'] : fail();
 $selected_date = isset($_POST['date']) ? $_POST['date'] : fail();
 $selected_time = isset($_POST['time']) ? $_POST['time'] : fail();
 $duration = isset($_POST['duration']) ? $_POST['duration'] : fail();
 $sex = isset($_POST['sex']) ? $_POST['sex'] : fail();
 $email = isset($_POST['email']) ? $_POST['email'] : fail();

 $delivery_address= isset($_POST['delivery_address']) ? $_POST['delivery_address'] : fail();

 $prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : fail();
 $status = isset($_POST['status']) ? $_POST['status'] : fail();
 $appointment_id = isset($_POST['appointment_id']) ? $_POST['appointment_id'] : fail();




// query products
$stmt = $appointment->updateAppointment($appointment_id, $cust_id, $category_id, $application_id, $address, $delivery_address, $budget, $county_id, $commision, $agent_id, $comment, $status, $selected_date, $selected_time, $prof_id );



//$stmt = $appointment->create('', $cust_id, $application_id, '', '', $address, $budget, $commision, $agent_id, $comment,'3');
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 if($stmt){ 

 	if(($_POST['startDate'] != $_POST['old_start']) || ($_POST['old_end'] != $_POST['endDate']) || ($_POST['address'] != $_POST['old_address'])|| ($_POST['time'] != $_POST['old_time'])){


 			include_once '../objects/professional.php';
    		$professional = new Professional($db);
    		$professional->id = $prof_id;
    		$professional_stmt = $professional->readOne();
    		//$professional_surname = $professional->last_name;
    		$professional_mobile = $professional->mobile; 

    	
 			
 			$professional_mobile = '6940589493';

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



 	echo json_encode(
       array("message" => "Completed")
 	);
 }
 else{
 	echo json_encode(
       array("message" => "No Appointment found.")
 	);
 }
// check if more than 0 record found

function fail(){
	echo json_encode(
       array("Error" => "Missing Argument")
 	);
 	die();
}
?>