<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'ProfessionalClass.php';

// instantiate database and product object

$database = new Database();
$db = $database->getConnection();

// initialize object
$GetProfessionalClass = new ProfessionalClass($db);

// get keywords
if(isset($_REQUEST['email']))
{
	$email=isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";

	$stmt = $GetProfessionalClass->CheckProfessionalExists($email);

	if($stmt == 1){
		$pass = $GetProfessionalClass->GenerateRandomString();
		$UpdatePassword = $GetProfessionalClass->ForgetPasswordProf($pass,$email);

		$row_array['status'] = "1";
        $row_array['msg'] = "Mail Sent Successfully";
		echo json_encode($row_array);

	}

	else{
		$row_array['status'] = "0";
		$row_array['msg'] = "Professional not found";
		echo json_encode($row_array);
	}
}
else{
	$row_array['status'] = "0";
	$row_array['msg'] = "Please enter parameter";
	echo json_encode($row_array);
}
?>