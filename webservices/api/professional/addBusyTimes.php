<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/professional.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$prof_id = isset($_POST['prof_id']) ? $_POST['prof_id'] : die();



// initialize object
$professional = new Professional($db);
 
// query products
if(@$_POST['busy_date']){
	$busy_date = isset($_POST['busy_date']) ? $_POST['busy_date'] : "";
	$busy_time = isset($_POST['busy_time']) ? $_POST['busy_time'] : "";
	if ( $busy_time == "" ){
	    $busy_time = ("08:00-22:00");
	}

	$stmt = $professional->addBusy($prof_id, $busy_date, $busy_time);
}else if(@$_POST['startDate']){


	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	

	if(@$_POST['allday']){
		$startTime = "08:00";
		$endTime = "22:00";
	}else{
		$startTime = $_POST['startTime'];
		$endTime = $_POST['endTime'];
	}
	



	if($startDate == $endDate){
		$busy_time = $startTime.'-'.$endTime;
		$professional->addBusy($prof_id, $startDate, $busy_time);
	}else if($startDate <= $endDate){

		$now       = strtotime($endDate); // or your date as well
		$your_date = strtotime($startDate);
		$datediff  = $now - $your_date;

		$numdays = round($datediff / (60 * 60 * 24));
		$tdays = $numdays + 1;

		for ($i=1; $i <= $tdays; $i++) { 
			# code...
			if($i == 1){
			
				$busy_time = $startTime.'-'.$endTime;
				$currentdate = $startDate;
				$stmt = $professional->addBusy($prof_id, $currentdate, $busy_time);
			
			}else if($i == $tdays){
				
				$busy_time = $startTime.'-'.$endTime;
				$currentdate = $endDate;
				$professional->addBusy($prof_id, $currentdate, $busy_time);
			
			}else{

				$busy_time = $startTime.'-'.$endTime;
				$addday = $i - 1;
				$currentdate = date("Y-m-d",strtotime("+$addday days"));	
				$professional->addBusy($prof_id, $currentdate, $busy_time);

			}
		}
		
	}

	//$stmt = $professional->addBusyPattern($prof_id, $startDate, $endDate, $startTime, $endTime);
}
 
// check if more than 0 record found
if($stmt){
    echo json_encode(
        array("message" => "Busy Time added successfully.")
    );
}else{
    echo json_encode(
        array("message" => "Busy Time Not Added.")
    );
}
?>
