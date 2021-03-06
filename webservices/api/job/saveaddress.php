<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/job.php';

include_once '../../../functions.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();


// initialize object
$job = new Job($db);

$id            = isset($_POST['job_id']) ? $_POST['job_id'] : die();
$city          = isset($_POST['job_city']) ? $_POST['job_city'] : "";
$county_id        = isset($_POST['job_county']) ? $_POST['job_county'] : "";
$country_id       = isset($_POST['job_country']) ? $_POST['job_country'] : "";
$postcode      = isset($_POST['job_postcode']) ? $_POST['job_postcode'] : "";



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