<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/reviews.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();



// initialize object
$review = new Review($db);

$quality = $_POST['quality'];
$reliability = $_POST['reliability'];
$cost = $_POST['cost'];
$schedule = $_POST['schedule'];
$behaviour = $_POST['behaviour'];
$cleanliness = $_POST['cleanliness'];
$professional_id = $_POST['professional_id'];
$customer_id = $_POST['customer_id'];
$category_id = $_POST['category_id'];
$appointment_id = $_POST['appointment_id'];
$agent_id = $_POST['agent_id'];
$comment = $_POST['comment'];



 
// query products
$stmt = $review->save($quality, $reliability, $cost, $schedule, $behaviour,$cleanliness, $professional_id, $customer_id, $appointment_id, $agent_id, $category_id, $comment);
//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if($stmt){

    if($quality == 5 && $reliability == 5 && $cost == 5 && $schedule == 5 && $behaviour == 5 && $cleanliness == 5){
    		include_once '../objects/customer.php';
    		include_once '../objects/viber.php';
    		$customer = new Customer($db);
    		$customer->id = $customer_id;
    		$cdata = $customer->readOne();

	    	// initialize object
    		$customer_mobile = $customer->mobile;
    		$customer_mobile = '6940589493';

			$smsTexts = "Η άποψή σας είναι πολύτιμη, Αξιολογήστε μας στο google goo.gl/WRGed8 ή στο facebook goo.gl/ZqQRRC και κερδίστε αυτόματα έκπτωση 10€ για την επόμενη εργασία μέσω του myconstructor! ";

			// Viber Connection			
			$viber = new Viber($db);
			
			$viber->send($customer_mobile, $smsTexts);

	}

 
    echo json_encode(
        array("message" => "Review added successfully.")
    );
}
 
else{
    echo json_encode(
        array("message" => "Please try again.")
    );
}
?>