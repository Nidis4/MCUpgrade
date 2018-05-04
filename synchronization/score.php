<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

include 'functions.php';

echo "In Score<br>";

$today = date("Y/m/d");
//$today = "2018/01/01";

$minus2days = date('Y/m/d', strtotime($today.' -2 days'));
$minus1month = date('Y/m/d', strtotime($today.' -1 month'));
$minus3months = date('Y/m/d', strtotime($today.' -3 months'));
$minus12months = date('Y/m/d', strtotime($today.' -12 months'));

$today .= " 00:00:00";
$minus1month .= " 00:00:00";
$minus2days .= " 00:00:00";
$minus3months .= " 00:00:00";
$minus12months .= " 00:00:00";


echo "Today : ".$today."<br>";
echo "2 days: ".$minus2days."<br>";
echo "1month: ".$minus1month."<br>";
echo "3month: ".$minus3months."<br>";
echo "12monh: ".$minus12months."<br><br>";

$profs = getVerifiedProfessionals();

while ($row = $profs->fetch_assoc()) {
	$id = $row['id'];
	$first = $row['first_name'];
	$last = $row['last_name'];
	
	echo $id.": ".$first." ".$last."<br>";

	$commisionEarned = round(getCommisions($id, $minus3months, $today),2);
	$amountPaid = round(getPayments($id, $minus3months, $today),2);
	if ($commisionEarned>0){
		$conv = round(($amountPaid/$commisionEarned),2);
	}
	else{
		$conv = 0;
	}
		
	$reviews = round(getReviewsPerc($id, $minus12months, $today),2);
	
	$categories = getCategories($id);
	
	while ($cat = $categories->fetch_assoc()) {
		$cat_id = $cat['category_id'];
		$market = round(getPaymentByCategory($id, $cat_id, $minus1month, $today),2);
		$score = (($market*0.25) + ($conv*0.25) + ($reviews*0.50))*100;

		echo "Category: ".$cat_id."<br>";
		echo $amountPaid." / ".$commisionEarned." ------ $conv <br>"; 
		echo "Market Share: ".$market."<br>";
		echo "Reviews: ".$reviews."<br>";
		echo "Score: ".$score."<br><br>";

		updateScore($id, $cat_id, $conv, $market, $reviews, $score);
	}

}
?>