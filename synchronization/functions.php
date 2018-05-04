<?php

$upgrade_db_name = 'upgradem_main';
$upgrade_user_name = 'upgradem_super';
$upgrade_db_pass = 'x}zLIzWrI^zC';

$upgrade_user_name = "root";
$upgrade_db_pass = "";


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

function getVerifiedProfessionals(){
	$upgrade = UpgradeDB();
	$query = "SELECT * FROM `professionals` WHERE `verified` = 1";
	
	//echo $query;
	$result = $upgrade->query($query);
	return $result;
}

function getCommisions($prof_id, $startDate, $endDate){
	$upgrade = UpgradeDB();
	$query = "SELECT SUM(`commision`) AS `commision`  FROM `appointments` WHERE `prof_member_id` = ".$prof_id." AND `status` IN (0,1) AND `date` BETWEEN '".$startDate."' AND '".$endDate."' ";
	//echo $query;
	$result = $upgrade->query($query);
	$row = $result->fetch_assoc();
	
	//echo $row['customer_id']."----<br>";
	if ($row['commision']==""){
		$commision = 0;
	}
	else{
		$commision = $row['commision'];
	}
	return $commision;
}

function getPayments($prof_id, $startDate, $endDate){
	$upgrade = UpgradeDB();
	$query = "SELECT SUM(`amount`) AS `amount`  FROM `payments` WHERE `professional_id` = ".$prof_id." AND `status` = 1 AND `datetime_added` BETWEEN '".$startDate."' AND '".$endDate."' ";
	//echo $query;
	$result = $upgrade->query($query);
	$row = $result->fetch_assoc();
	
	//echo $row['customer_id']."----<br>";
	if ($row['amount']==""){
		$amount = 0;
	}
	else{
		$amount = $row['amount'];
	}
	return $amount;
}

function getPaymentByCategory($prof_id, $cat_id, $startDate, $endDate){
	$upgrade = UpgradeDB();
	 $query = "SELECT SUM(amount) AS main FROM `payments` WHERE professional_id = ".$prof_id." AND category_id = ".$cat_id." AND `status` = 1 AND `datetime_added` BETWEEN '".$startDate."' AND '".$endDate."'ORDER BY main DESC";
	 //echo $query;
	 $result = $upgrade->query($query);
	 $row = $result->fetch_assoc();
	 
	 if ($row['main']==""){
	  $perc = 0;
	 }
	 else{
	  $amount = $row['main'];
	  $query = "SELECT SUM(amount) AS main FROM `payments` WHERE category_id = $cat_id AND `datetime_added` AND `status` = 1 BETWEEN '".$startDate."' AND '".$endDate."' ";
	  $result = $upgrade->query($query);
	  $row = $result->fetch_assoc();

	  $totalAmount = $row['main'];
	  if ($totalAmount==""){
	  	$perc = 0;
	  }else{
	  	$perc = $amount/$totalAmount;
	  }
	}
	
	
	return $perc;
}


function getReviewsPerc($prof_id, $startDate, $endDate){
	$upgrade = UpgradeDB();
	$query = "SELECT (AVG(`quality`) + AVG(`reliability`) + AVG(`cost`) + AVG(`schedule`) + AVG(`behaviour`) + AVG(`cleanliness`))/6 AS gloval_avg FROM `directory_ratings` WHERE `professional_id` = ".$prof_id." AND `created` BETWEEN '".$startDate."' AND '".$endDate."' ";

	$result = $upgrade->query($query);
	$row = $result->fetch_assoc();
	if ($row['gloval_avg']==""){
		$perc = 0;
	}
	else{
		$perc = $row['gloval_avg']/5;
	}
	return $perc;
}

function updateScore($id, $cat_id, $conv, $market, $reviews, $score){
	$upgrade = UpgradeDB();
	$query = "INSERT INTO `professionals_scoring`(`PROF_ID`, `CATEGORY_ID`, `PAYMENTS_CONVERSION`, `MARKET_SHARE`, `REVIEWS`, `TOTAL`) VALUES ('$id','$cat_id','$conv','$market','$reviews','$score') ON DUPLICATE KEY UPDATE `PAYMENTS_CONVERSION` = '$conv', `MARKET_SHARE`='$market', `REVIEWS` = '$reviews', `TOTAL` = '$score' ";
	//echo $query;

	$result = $upgrade->query($query);

}

function getCategories($id){
	$upgrade = UpgradeDB();

	$query = "SELECT `category_id` FROM `professionals_applications` WHERE `professional_id` = $id GROUP BY `category_id`";
	//echo $query;
	$result = $upgrade->query($query);
	return $result;
}
?>