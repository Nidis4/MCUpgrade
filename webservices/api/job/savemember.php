<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/job.php';
include_once '../objects/customer.php';

include_once '../../../functions.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();


$customer_id      = "";
$job_id           = isset($_POST['job_id']) ? $_POST['job_id'] : die();
$first_name       = isset($_POST['first_name']) ? $_POST['first_name'] : "";
$last_name        = isset($_POST['last_name']) ? $_POST['last_name'] : "";

// initialize object
$job = new Job($db);
$job->id = mcdecode($job_id);

$jobstmt = $job->readOne();

if(@$job->title){

	// initialize object
	$customer = new Customer($db);	 
	// query products
	$stmt = $customer->update($customer_id, $first_name, $last_name, "", "Κύριε", $job->phone, '',  $job->email);

	$job->customer_id = $stmt;

	$job_customer = $job->update_customer();

	if($job_customer){
		echo json_encode(
	        array("message" => "Job added successfully.","error"=>0)
	    );
	    die;
	}else{
		echo json_encode(
	        array("message" => "Something went wrong.","error"=>0)
	    );
	    die;
	}

	echo "<pre>";
	print_r($stmt);
	die('customer_id');



}else{
	echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
    die;
}
echo "<pre>";
print_r($job);
die;





if(@$city && @$county_id && @$country_id){


	include_once '../objects/country.php';
	include_once '../objects/county.php';

	//die($_REQUEST['job_country']);
	$country = new Country($db);
	$country->id = $country_id;
	
	$country_stmt = $country->readOne();

	$county = new County($db);
	$county->id = $county_id;
	$county_stmt = $county->readOne();


	$address = urlencode($county_stmt['county_name'] . ',' . $city . ',' . $country_stmt['country_name']);
	
	$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
	$output = json_decode($geocode);
	if(@$output->results[0]->geometry->location->lat && @$output->results[0]->geometry->location->lng){
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
	}else{
		$lat = "";
		$long = "";
	}
	

	$stmt = $job->update_address(mcdecode($id), $city, $county_id, $country_id, $postcode, $lat, $long);

}else{
    $address = "";	
}

 
// query products

//$stmt = $customer->search($keywords);
//$num = $stmt->rowCount();
 
// check if more than 0 record found
if(@$stmt){ 
    echo json_encode(
        array("message" => "Job address added successfully.","job_id" => mcencode($stmt), "error"=>0)
    );
}
else{
    echo json_encode(
        array("message" => "Something went wrong.","error"=>1)
    );
}
?>