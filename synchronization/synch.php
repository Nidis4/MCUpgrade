<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$upgrade_db_name = 'upgradem_main';
$upgrade_user_name = 'upgradem_super';
$upgrade_db_pass = 'x}zLIzWrI^zC';

$live_db_name = 'my_constructor';
$live_user_name = 'stgmycon_db_user';
$live_db_pass = 'u~,oEFS]5b}I';


//echo "Synchronization Starts<br>";
//syncCategories();
//syncApplications();
//syncCustomers();
//syncProfessionals();
//syncAppointments();
//syncReviews();

$func = isset($_POST['fun']) ? $_POST['fun'] : "";

if ($func == "syncTest"){
	syncTest();
}
else if ($func == "Categories"){
	syncCategories();
}
else if ($func == "Applications"){
	syncApplications();
}
else if ($func == ""){

}
else{
	echo "Klarino";
}

function syncTest(){
	echo "Inside";
}


function syncReviews(){
	echo "In Sync Reviews<br>";

	$query = "SELECT `id`, `professional_id`, `employer_id`, `agent_id`, `appointment_id`, `category_id`, `job_title`, `quality`, `reliability`, `cost`, `schedule`, `behaviour`, `cleanliness`, `active`, `comment`, `professional_comment`, `created`, `modified` FROM `directory_ratings` ";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertReview($row['id'], $row['professional_id'], $row['employer_id'], $row['agent_id'], $row['appointment_id'], $row['category_id'], $row['job_title'], $row['quality'], $row['reliability'], $row['cost'], $row['schedule'], $row['behaviour'], $row['cleanliness'], $row['active'], $row['comment'], $row['professional_comment'], $row['created'], $row['modified']);
	    }

	    /* free result set */
	    $result->free();
	}
}


function insertReview($id, $professional_id, $employer_id, $agent_id, $appointment_id, $category_id, $job_title, $quality, $reliability, $cost, $schedule, $behaviour, $cleanliness, $active, $comment, $professional_comment, $created, $modified){
	//echo "Inserting Appointment ".$id."<br>";

	$upgrade = UpgradeDB();

	$query = "INSERT INTO `directory_ratings`( `id`, `professional_id`, `customer_id`, `agent_id`, `appointment_id`, `category_id`, `job_title`, `quality`, `reliability`, `cost`, `schedule`, `behaviour`, `cleanliness`, `active`, `comment`,  `professional_comment`, `created`, `modified`) VALUES ('".$id."', '".$professional_id."', '".$employer_id."', '".$agent_id."', '".$appointment_id."', '".$category_id."', '".$job_title."', '".$quality."', '".$reliability."', '".$cost."', '".$schedule."', '".$behaviour."', '".$cleanliness."', '".$active."', \"".$comment."\", '".$professional_comment."', '".$created."', '".$modified."') ";
	
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
}

function syncAppointments(){
	echo "In Sync Appointments<br>";

	$query = "SELECT `id`, `member_id`, `mobile`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment` FROM `appointments` WHERE `category_id`!=0";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertAppointment($row['id'], $row['member_id'], $row['mobile'], $row['application_id'], $row['date'], $row['time'], $row['address'], $row['budget'], $row['commision'], $row['agent_id'], $row['comment'], $row['sms'], $row['sms_log_id'], $row['googleEventId'], $row['datetimeCreated'], $row['datetimeStatusUpdated'], $row['sourceAppointmentId'], $row['status'], $row['cancelComment']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertAppointment($id, $prof_member_id, $mobile, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $sms, $sms_log_id, $googleEventId, $datetimeCreated, $datetimeStatusUpdated, $sourceAppointmentId, $status, $cancelComment){
	//echo "Inserting Appointment ".$id."<br>";

	$upgrade = UpgradeDB();

	$cust_member_id = getIDByMobile($mobile);

	$address = $upgrade->real_escape_string($address);
	$comment = $upgrade->real_escape_string($comment);

	$query = "INSERT INTO `appointments`(`id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`) VALUES (".$id.",'".$prof_member_id."','".$cust_member_id."','".$application_id."','".$date."','".$time."','".$address."','".$budget."','".$commision."','".$agent_id."' ,'".$comment."' ,'".$sms."' ,'".$sms_log_id."' ,'".$googleEventId."' ,'".$datetimeCreated."' ,'".$datetimeStatusUpdated."' ,'".$sourceAppointmentId."' ,'".$status."' ,'".$cancelComment."') ON DUPLICATE KEY UPDATE `prof_member_id`='".$prof_member_id."', `cust_member_id`='".$cust_member_id."', `application_id`='".$application_id."', `date`='".$date."', `time`='".$time."', `address`='".$address."', `budget`='".$budget."', `commision`='".$commision."', `agent_id`='".$agent_id."', `comment`='".$comment."', `sms`='".$sms."', `sms_log_id`='".$sms_log_id."', `googleEventId`='".$googleEventId."', `datetimeCreated`='".$datetimeCreated."', `datetimeStatusUpdated`='".$datetimeStatusUpdated."', `sourceAppointmentId`='".$sourceAppointmentId."', `status`='".$status."', `cancelComment`='".$cancelComment."' ";
	
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
}

function syncProfessionals(){
	echo "In Sync Professionals<br>";
	$query = "SELECT `id`, `first_name`, `last_name`, `nick_name`, `current_working`, `description`, `image`, `id_card_number`, `personal_vat_id`, `company_vat_id`, `profile_status`, `profile_status_change_reason`, `admin_comments`, `hide_earning`, `sex`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`, `address`, `area`, `city`, `country_id`, `postcode`, `latitude`, `longitude`, `phone`, `mobile_no` FROM `members` WHERE `user_type`='Professional'";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	    	$serviceArea = $row['address'];
	    	$address = getAddressByProfID($row['id']);
	        insertProfessional($row['id'], $row['first_name'], $row['last_name'], $row['nick_name'], $row['current_working'], $row['description'], $row['image'], $row['id_card_number'], $row['personal_vat_id'], $row['company_vat_id'], $row['profile_status'], $row['profile_status_change_reason'], $row['admin_comments'], $row['hide_earning'], $row['sex'], $row['email'], $row['password'], $row['created'], $row['modified'], $row['last_login'], $row['last_login_ip'], $row['status'], $serviceArea, $address, $row['area'], $row['city'], $row['country_id'], $row['postcode'], $row['latitude'], $row['longitude'], $row['phone'], $row['mobile_no']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertProfessional($id, $first_name, $last_name, $nick_name, $current_working, $description, $image, $id_card_number, $personal_vat_id, $company_vat_id, $profile_status, $profile_status_change_reason, $admin_comments, $hide_earning, $sex, $email, $password, $created, $modified, $last_login, $last_login_ip, $status, $serviceArea, $address, $area, $city, $country_id, $postcode, $latitude, $longitude, $phone, $mobile_no){
	//echo "Inserting Professional ".$id."<br>";
	$upgrade = UpgradeDB();
	
	$first_name = $upgrade->real_escape_string($first_name);
	$area = $upgrade->real_escape_string($area);
	$description = $upgrade->real_escape_string($description);
	$admin_comments = $upgrade->real_escape_string($admin_comments);
	$query = "INSERT INTO `professionals`(`id`, `first_name`, `last_name`, `nick_name`, `current_working`, `description`, `service_area`, `image`, `id_card_number`, `personal_vat_id`, `company_vat_id`, `profile_status`, `profile_status_change_reason`, `admin_comments`, `hide_earning`, `sex`) VALUES (".$id.",'".$first_name."','".$last_name."' ,'".$nick_name."' ,'".$current_working."','".$description."' ,'".$serviceArea."' ,'".$image."' ,'".$id_card_number."' ,'".$personal_vat_id."' ,'".$company_vat_id."' ,'".$profile_status."' ,'".$profile_status_change_reason."' ,'".$admin_comments."' ,'".$hide_earning."' ,'".$sex."') ON DUPLICATE KEY UPDATE `first_name`='".$first_name."', `last_name`='".$last_name."', `nick_name`='".$nick_name."', `current_working`='".$current_working."', `description`='".$description."', `service_area`='".$serviceArea."' ,  `image`='".$image."', `id_card_number`='".$id_card_number."', `personal_vat_id`='".$personal_vat_id."', `company_vat_id`='".$company_vat_id."', `profile_status`='".$profile_status."', `profile_status_change_reason`='".$profile_status_change_reason."', `admin_comments`='".$admin_comments."', `hide_earning`='".$hide_earning."', `sex`='".$sex."' ";
	
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}


	$query = "INSERT INTO `professionals_account_info`(`professional_id`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`) VALUES (".$id.",'".$email."','".$password."','".$created."','".$modified."','".$last_login."','".$last_login_ip."','".$status."') ON DUPLICATE KEY UPDATE `email`='".$email."', `password`='".$password."', `created`='".$created."', `modified`='".$modified."', `last_login`='".$last_login."', `last_login_ip`='".$last_login_ip."', `status`='".$status."' ";
	$query = "INSERT INTO `professionals_account_info`(`professional_id`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`) VALUES (".$id.",'".$email."','".$password."','".$created."','".$modified."','".$last_login."','".$last_login_ip."','".$status."') ";
	$result = $upgrade->query($query);
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}

	$query = "INSERT INTO `professionals_contact_details`(`professional_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longitude`, `postcode`, `phone`, `mobile`) VALUES (".$id.",'".$address."','".$area."','".$city."','".$country_id."','".$latitude."','".$longitude."','".$postcode."','".$phone."','".$mobile_no."') ON DUPLICATE KEY UPDATE `address`='".$address."', `area`='".$area."', `city`='".$city."', `country_id`='".$country_id."', `latitude`='".$latitude."', `longitude`='".$longitude."',`postcode`='".$postcode."', `phone`='".$phone."', `mobile`='".$mobile_no."' ";
	$query = "INSERT INTO `professionals_contact_details`(`professional_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longitude`, `postcode`, `phone`, `mobile`) VALUES (".$id.",'".$address."','".$area."','".$city."','".$country_id."','".$latitude."','".$longitude."','".$postcode."','".$phone."','".$mobile_no."')";
	$result = $upgrade->query($query);
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}

}

function syncCustomers(){
	echo "In Sync Customers<br>";
	$query = "SELECT `id`, `first_name`, `last_name`, `sex`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`, `address`, `area`, `city`, `country_id`, `postcode`, `latitude`, `longitude`, `phone`, `mobile_no` FROM `members` WHERE `user_type`='Employer'";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertCustomers($row['id'], $row['first_name'], $row['last_name'], $row['sex'], $row['email'], $row['password'], $row['created'], $row['modified'], $row['last_login'], $row['last_login_ip'], $row['status'], $row['address'], $row['area'], $row['city'], $row['country_id'], $row['postcode'], $row['latitude'], $row['longitude'], $row['phone'], $row['mobile_no']);
	    }

	    /* free result set */
	    $result->free();
	}

	$query = "SELECT `name`, `surname`,`address`, `mobile`, `land_line`, `email`, `sex`,`datetimeCreated` FROM `appointments` WHERE `mobile`!= '' GROUP BY `mobile`";
	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertCustomers('', $row['name'], $row['surname'], $row['sex'], $row['email'], '', $row['datetimeCreated'], $row['datetimeCreated'], '', '', '', $row['address'], '', '', '', '', '', '', $row['land_line'], $row['mobile']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertCustomers($id, $first_name, $last_name, $sex, $email, $password, $created, $modified, $last_login, $last_login_ip, $status, $address, $area, $city, $country_id, $postcode, $latitude, $longitude, $phone, $mobile_no){
	//echo "Inserting Customer ".$id."<br>";
	$upgrade = UpgradeDB();

	$first_name = $upgrade->real_escape_string($first_name);
	$last_name = $upgrade->real_escape_string($last_name);
	$address = $upgrade->real_escape_string($address);
	$area = $upgrade->real_escape_string($area);
	$city = $upgrade->real_escape_string($city);

	$query = "INSERT INTO `customers`(`id`, `first_name`, `last_name`, `sex`) VALUES ('".$id."','".$first_name."','".$last_name."','".$sex."') ON DUPLICATE KEY UPDATE `first_name`='".$first_name."', `last_name`='".$last_name."', `sex`='".$sex."' ";
	
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
	//echo $query."<br>";
	if ($id==''){
		$id = mysqli_insert_id($upgrade);
	}
	$query = "INSERT INTO `customers_account_info`(`customer_id`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`) VALUES ('".$id."','".$email."','".$password."','".$created."','".$modified."','".$last_login."','".$last_login_ip."','".$status."') ON DUPLICATE KEY UPDATE `email`='".$email."', `password`='".$password."', `created`='".$created."', `modified`='".$modified."', `last_login`='".$last_login."', `last_login_ip`='".$last_login_ip."', `status`='".$status."' ";
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
	//echo $query."<br>";

	$query = "INSERT INTO `customers_contact_details`(`customer_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longitude`, `postcode`, `phone`, `mobile`) VALUES ('".$id."','".$address."','".$area."','".$city."','".$country_id."','".$latitude."','".$longitude."','".$postcode."','".$phone."','".$mobile_no."') ON DUPLICATE KEY UPDATE `address`='".$address."', `area`='".$area."', `city`='".$city."', `country_id`='".$country_id."', `latitude`='".$latitude."', `longitude`='".$longitude."',`postcode`='".$postcode."', `phone`='".$phone."', `mobile`='".$mobile_no."' ";
	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
	//echo $query."<br>";
}

function syncCategories(){
	echo "In Sync Categories<br>";
	$query = "SELECT `id`, `name`, `name_greek`, `title`, `title_greek`, `description`, `description_greek`, `sequence`, `modified`, `commissionRate` FROM `categories`";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertCategories($row['id'], $row['name'], $row['name_greek'], $row['title'], $row['title_greek'], $row['description'], $row['description_greek'], $row['sequence'], $row['modified'], $row['commissionRate']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertCategories($id, $name, $name_greek, $title, $title_greek, $description, $description_greek, $sequence, $modified, $commissionRate){
	//echo "Inserting Category ".$id."<br>";
	$upgrade = UpgradeDB();
	$name_greek = $upgrade->real_escape_string($name_greek);
	$title_greek = $upgrade->real_escape_string($title_greek);
	$description_greek = $upgrade->real_escape_string($description_greek);

	$query = "INSERT INTO `categories` ( `id`, `name`, `name_greek`, `title`, `title_greek`, `description`, `description_greek`, `sequence`, `modified`, `commissionRate`) VALUES (".$id.",'".$name."','".$name_greek."','".$title."','".$title_greek."','".$description."','".$description_greek."','".$sequence."','".$modified."','".$commissionRate."') ON DUPLICATE KEY UPDATE `name`='".$name."', `name_greek`='".$name_greek."', `title`='".$title."', `description`='".$description."', `sequence`='".$sequence."', `modified`='".$modified."', `commissionRate`='".$commissionRate."' ";
	//echo $query;

	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
}

function syncApplications(){
	echo "In Sync Applications<br>";
	$query = "SELECT `id`, `category_id`, `title`, `title_greek`, `short_description`, `short_description_gr`, `detail_description`, `detail_description_gr`, `unit`, `min_price`, `sequence`, `modified` FROM `applications`";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertApplications($row['id'], $row['category_id'], $row['title'], $row['title_greek'], $row['short_description'], $row['short_description_gr'], $row['detail_description'], $row['detail_description_gr'], $row['unit'], $row['min_price'], $row['sequence'], $row['modified']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertApplications($id, $category_id, $title, $title_greek, $short_description, $short_description_gr, $detail_description, $detail_description_gr, $unit, $min_price, $sequence, $modified){
	//echo "Inserting Applications ".$id."<br>";
	$upgrade = UpgradeDB();

	$title = $upgrade->real_escape_string($title);
	$short_description = $upgrade->real_escape_string($short_description);
	$short_description_gr = $upgrade->real_escape_string($short_description_gr);
	$detail_description = $upgrade->real_escape_string($detail_description);
	$detail_description_gr = $upgrade->real_escape_string($detail_description_gr);

	$query = "INSERT INTO `applications` ( `id`, `category_id`, `title`, `title_greek`, `short_description`, `short_description_gr`, `detail_description`, `detail_description_gr`, `unit`, `min_price`, `sequence`, `modified`) VALUES (".$id.",'".$category_id."','".$title."','".$title_greek."','".$short_description."','".$short_description_gr."','".$detail_description."','".$detail_description_gr."','".$unit."','".$min_price."', '".$sequence."', '".$modified."') ON DUPLICATE KEY UPDATE `category_id`='".$category_id."', `title`='".$title."', `title_greek`='".$title_greek."', `short_description`='".$short_description."', `detail_description`='".$detail_description."', `unit`='".$unit."', `min_price`='".$min_price."', `sequence`='".$sequence."', `modified`='".$modified."' ";

	if (!$upgrade->query($query)) {
	    echo $query."<br>";
	    printf("Errormessage: %s\n", $upgrade->error);
	}
}

function getIDByMobile($mobile){
	$upgrade = UpgradeDB();
	$query = "SELECT `customer_id` FROM `customers_contact_details` WHERE `mobile`='".$mobile."' LIMIT 0,1";
	
	//echo $query;
	$result = $upgrade->query($query);
	$row = $result->fetch_assoc();
	
	//echo $row['customer_id']."----<br>";
	return $row['customer_id'];
}

function getAddressByProfID($id){
	$live = LiveDB();
	$query = "SELECT `address`  FROM `my_constructor`.`professionals` WHERE `member_id`=".$id."";
	
	//echo $query;
	$result = $live->query($query);
	$row = $result->fetch_assoc();
	
	//echo $row['customer_id']."----<br>";
	return $row['address'];
}

function LiveDB(){
	global $live_user_name;
	global $live_db_pass;
	global $live_db_name;

	$con = mysqli_connect("localhost", $live_user_name, $live_db_pass, $live_db_name);
	mysqli_query($con, "SET NAMES 'utf8'"); 
	mysqli_query($con, "SET CHARACTER SET 'utf8'"); 

	if (mysqli_connect_errno())
	  {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	 return $con;
}

function UpgradeDB(){
	global $upgrade_db_pass;
	global $upgrade_user_name;
	global $upgrade_db_name;

	 $con = mysqli_connect("localhost", $upgrade_user_name, $upgrade_db_pass, $upgrade_db_name);
	 mysqli_query($con, "SET NAMES 'utf8'"); 
	 mysqli_query($con, "SET CHARACTER SET 'utf8'"); 
	
	 if (mysqli_connect_errno())
	   {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
	 return $con;
}

?>