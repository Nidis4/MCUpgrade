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


		$repeatbusy = $_POST['repeatbusy'];

		$busy_time = $startTime.'-'.$endTime;
		for ($i=1; $i <= $tdays; $i++) { 
			# code...
			if($repeatbusy == "weekly") {
				$dayN = date("N");
				$addday = $i - 1;
				$mday = date("N",strtotime("$startDate +$addday days"));

				if($dayN == $mday){
					$currentdate = date("Y-m-d",strtotime("$startDate +$addday days"));	
					$stmt =  $professional->addBusy($prof_id, $currentdate, $busy_time);
				}
			}else if($repeatbusy == "monthly") {
				$dayN = date("N");
				$d = date('d');
                $nd = ceil($d/7);

				$addday = $i - 1;
				$mday = date("N",strtotime("$startDate +$addday days"));
				$nday = date("d",strtotime("$startDate +$addday days"));
				$cnday = ceil($nday/7);

				if(($dayN == $mday) && ($nd == $cnday)){
					$currentdate = date("Y-m-d",strtotime("$startDate +$addday days"));	
					$stmt =  $professional->addBusy($prof_id, $currentdate, $busy_time);
				}
			}else if($repeatbusy == "annually") {
				$dayN = date("d-m");
				$addday = $i - 1;
				$mday = date("d-m",strtotime("$startDate +$addday days"));
				if($dayN == $mday){
					$currentdate = date("Y-m-d",strtotime("$startDate +$addday days"));	
					$stmt =  $professional->addBusy($prof_id, $currentdate, $busy_time);
				}
			}else if($repeatbusy == "weekday") {
				//$dayN = date("N");
				$addday = $i - 1;
				$mday = date("N",strtotime("$startDate +$addday days"));
				if(($mday == 1) || ($mday == 2) || ($mday == 3) || ($mday == 4) || ($mday == 5)){
					$currentdate = date("Y-m-d",strtotime("$startDate +$addday days"));	
					$stmt =  $professional->addBusy($prof_id, $currentdate, $busy_time);
				}
			}else{

				if($i == 1 ){
				
					$currentdate = $startDate;
					$stmt = $professional->addBusy($prof_id, $currentdate, $busy_time);
				
				}else if($i == $tdays){
					
					$currentdate = $endDate;
					$professional->addBusy($prof_id, $currentdate, $busy_time);
				
				}else{

					
					$addday = $i - 1;
					$currentdate = date("Y-m-d",strtotime("$startDate +$addday days"));	
					$professional->addBusy($prof_id, $currentdate, $busy_time);

				}

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
