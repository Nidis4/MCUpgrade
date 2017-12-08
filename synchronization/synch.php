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


echo "Synchronization Starts<br>";
syncCategories();
syncApplications();
syncCustomers();
syncProfessionals();

function syncProfessionals(){
	echo "In Sync Professionals<br>";
	$query = "SELECT `id`, `first_name`, `last_name`, `nick_name`, `current_working`, `description`, `image`, `id_card_number`, `personal_vat_id`, `company_vat_id`, `profile_status`, `profile_status_change_reason`, `admin_comments`, `hide_earning`, `sex`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`, `address`, `area`, `city`, `country_id`, `postcode`, `latitude`, `longitude`, `phone`, `mobile_no` FROM `members` WHERE `user_type`='Professional'";

	$live = LiveDB();
	if ($result = $live->query($query)) {

	    /* fetch associative array */
	    while ($row = $result->fetch_assoc()) {
	        insertProfessional($row['id'], $row['first_name'], $row['last_name'], $row['nick_name'], $row['current_working'], $row['description'], $row['image'], $row['id_card'], $row['id_card_number'], $row['personal_vat_id'], $row['company_vat_id'], $row['profile_status'], $row['profile_status_change_reason'], $row['admin_comments'], $row['hide_earning'], $row['sex'], $row['email'], $row['password'], $row['created'], $row['modified'], $row['last_login'], $row['last_login_ip'], $row['status'], $row['address'], $row['area'], $row['city'], $row['country_id'], $row['postcode'], $row['latitude'], $row['longitude'], $row['phone'], $row['mobile_no']);
	    }

	    /* free result set */
	    $result->free();
	}
}

function insertProfessional($id, $first_name, $last_name, $nick_name, $current_working, $description, $image, $id_card_number, $personal_vat_id, $company_vat_id, $profile_status, $profile_status_change_reason, $admin_comments, $hide_earning, $sex, $email, $password, $created, $modified, $last_login, $last_login_ip, $status, $address, $area, $city, $country_id, $postcode, $latitude, $longitude, $phone, $mobile_no){
	echo "Inserting Customer ".$id."<br>";

	$query = "INSERT INTO `professionals`(`id`, `first_name`, `last_name`, `nick_name`, `current_working`, `description`, `image`, `id_card_number`, `personal_vat_id`, `company_vat_id`, `profile_status`, `profile_status_change_reason`, `admin_comments`, `hide_earning`, `sex`) VALUES (".$id.",'".$first_name."','".$last_name."' ,'".$nick_name."' ,'".$current_working."','".$description."' ,'".$image."' ,'".$id_card."' ,'".$id_card_number."' ,'".$personal_vat_id."' ,'".$company_vat_id."' ,'".$profile_status."' ,'".$profile_status_change_reason."' ,'".$admin_comments."' ,'".$hide_earning."' ,'".$sex."') ON DUPLICATE KEY UPDATE `first_name`='".$first_name."', `last_name`='".$last_name."', `nick_name`='".$nick_name."', `current_working`='".$current_working."', `description`='".$description."', `image`='".$image."', `id_card`='".$id_card."', `id_card_number`='".$id_card_number."', `personal_vat_id`='".$personal_vat_id."', `company_vat_id`='".$company_vat_id."', `profile_status`='".$profile_status."', `profile_status`='".$profile_status."', `profile_status`='".$profile_status."', `profile_status`='".$profile_status."' ";
	$upgrade = UpgradeDB();
	$result = $upgrade->query($query);
	echo $query."<br>";

	$query = "INSERT INTO `customers_account_info`(`customer_id`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`) VALUES (".$id.",'".$email."','".$password."','".$created."','".$modified."','".$last_login."','".$last_login_ip."','".$status."') ON DUPLICATE KEY UPDATE `email`='".$email."', `password`='".$password."', `created`='".$created."', `modified`='".$modified."', `last_login`='".$last_login."', `last_login_ip`='".$last_login_ip."', `status`='".$status."' ";
	$result = $upgrade->query($query);
	echo $query."<br>";

	$query = "INSERT INTO `customers_contact_details`(`customer_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longitude`, `postcode`, `phone`, `mobile`) VALUES (".$id.",'".$address."','".$area."','".$city."','".$country_id."','".$latitude."','".$longitude."','".$postcode."','".$phone."','".$mobile_no."') ON DUPLICATE KEY UPDATE `address`='".$address."', `area`='".$area."', `city`='".$city."', `country_id`='".$country_id."', `latitude`='".$latitude."', `longitude`='".$longitude."',`postcode`='".$postcode."', `phone`='".$phone."', `mobile`='".$mobile_no."' ";
	$result = $upgrade->query($query);
	echo $query."<br>";

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
}

function insertCustomers($id, $first_name, $last_name, $sex, $email, $password, $created, $modified, $last_login, $last_login_ip, $status, $address, $area, $city, $country_id, $postcode, $latitude, $longitude, $phone, $mobile_no){
	echo "Inserting Customer ".$id."<br>";

	$query = "INSERT INTO `customers`(`id`, `first_name`, `last_name`, `sex`) VALUES (".$id.",'".$first_name."','".$last_name."','".$sex."') ON DUPLICATE KEY UPDATE `first_name`='".$first_name."', `last_name`='".$last_name."', `sex`='".$sex."' ";
	$upgrade = UpgradeDB();
	$result = $upgrade->query($query);
	echo $query."<br>";

	$query = "INSERT INTO `customers_account_info`(`customer_id`, `email`, `password`, `created`, `modified`, `last_login`, `last_login_ip`, `status`) VALUES (".$id.",'".$email."','".$password."','".$created."','".$modified."','".$last_login."','".$last_login_ip."','".$status."') ON DUPLICATE KEY UPDATE `email`='".$email."', `password`='".$password."', `created`='".$created."', `modified`='".$modified."', `last_login`='".$last_login."', `last_login_ip`='".$last_login_ip."', `status`='".$status."' ";
	$result = $upgrade->query($query);
	echo $query."<br>";

	$query = "INSERT INTO `customers_contact_details`(`customer_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longitude`, `postcode`, `phone`, `mobile`) VALUES (".$id.",'".$address."','".$area."','".$city."','".$country_id."','".$latitude."','".$longitude."','".$postcode."','".$phone."','".$mobile_no."') ON DUPLICATE KEY UPDATE `address`='".$address."', `area`='".$area."', `city`='".$city."', `country_id`='".$country_id."', `latitude`='".$latitude."', `longitude`='".$longitude."',`postcode`='".$postcode."', `phone`='".$phone."', `mobile`='".$mobile_no."' ";
	$result = $upgrade->query($query);
	echo $query."<br>";

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
	echo "Inserting Category ".$id."<br>";

	$query = "INSERT INTO `categories` ( `id`, `name`, `name_greek`, `title`, `title_greek`, `description`, `description_greek`, `sequence`, `modified`, `commissionRate`) VALUES (".$id.",'".$name."','".$name_greek."','".$title."','".$title_greek."','".$description."','".$description_greek."','".$sequence."','".$modified."','".$commissionRate."') ON DUPLICATE KEY UPDATE `name`='".$name."', `name_greek`='".$name_greek."', `title`='".$title."', `title_greek`='".$title_greek."', `description`='".$description."', `description_greek`='".$description_greek."', `sequence`='".$sequence."', `modified`='".$modified."', `commissionRate`='".$commissionRate."' ";
	//echo $query;

	$upgrade = UpgradeDB();
	$result = $upgrade->query($query);
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
	echo "Inserting Applications ".$id."<br>";
	
	$short_description = base64_encode($short_description);
	$short_description_gr = base64_encode($short_description_gr);
	$detail_description = base64_encode($detail_description);
	$detail_description_gr = base64_encode($detail_description_gr);

	$query = "INSERT INTO `applications` ( `id`, `category_id`, `title`, `title_greek`, `short_description`, `short_description_gr`, `detail_description`, `detail_description_gr`, `unit`, `min_price`, `sequence`, `modified`) VALUES (".$id.",'".$category_id."','".$title."','".$title_greek."','".$short_description."','".$short_description_gr."','".$detail_description."','".$detail_description_gr."','".$unit."','".$min_price."', '".$sequence."', '".$modified."') ON DUPLICATE KEY UPDATE `category_id`='".$category_id."', `title`='".$title."', `title_greek`='".$title_greek."', `short_description`='".$short_description."', `short_description_gr`='".$short_description_gr."', `detail_description`='".$detail_description."', `detail_description_gr`='".$detail_description_gr."', `unit`='".$unit."', `min_price`='".$min_price."', `sequence`='".$sequence."', `modified`='".$modified."' ";

	$upgrade = UpgradeDB();
	$result = $upgrade->query($query);
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