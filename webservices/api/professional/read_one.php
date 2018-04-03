<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/professional.php';

include_once '../objects/payment.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$professional = new Professional($db);

// set ID property of product to be edited
$professional->id = isset($_GET['id']) ? $_GET['id'] : die();


//echo $customer->id;

// create array
$stmt = $professional->readOne();
$stmtApplications = $professional->getApplications();
$stmtCategories = $professional->getCategories();
$stmtReviews = $professional->getAllReviews();

$numCat = $stmtCategories->rowCount();
if($numCat >= 1){
    $categories_arr = array();

    while ($row = $stmtCategories->fetch(PDO::FETCH_ASSOC)){
        
        $category_item=array(
            "category_name" => $row['title'],
            "category_id" => $row['category_id'],
            "is_main" => $row['is_main']
        );
        array_push($categories_arr, $category_item);
    }
    $getCategories = $categories_arr; 
}else{
   $getCategories = array(); 
}


$stmtCounties = $professional->getCounties();
$numCat = $stmtCounties->rowCount();
if($numCat >= 1){
    $counties_arr = array();

    while ($row = $stmtCounties->fetch(PDO::FETCH_ASSOC)){
        
        $county_item=array(
            "county_name" => $row['county_name'],
            "county_id" => $row['county_id'],
            "is_main" => $row['is_main']
        );
        array_push($counties_arr, $county_item);
    }
    $getConties = $counties_arr; 
}else{
   $getConties = array(); 
}


$numRev = $stmtReviews->rowCount();
if($numRev >= 1){
    $reviews_arr = array();

    while ($row = $stmtReviews->fetch(PDO::FETCH_ASSOC)){
        
        $reviews_item=array(
            "quality" => $row['quality'],
            "reliability" => $row['reliability'],
            "cost" => $row['cost'],
            "schedule" => $row['schedule'],
            "behaviour" => $row['behaviour'],
            "cleaniness" => $row['cleanliness'],
            "comment" => $row['comment'],
            "created" => $row['created']

        );
        array_push($reviews_arr, $reviews_item);
    }
   
}else{
   $reviews_arr = array(); 
}


$stmtReviews = $professional->getReviewStats();
$numRev = $stmtReviews->rowCount();
if($numRev >= 1){
    //$reviewsStat_arr = array();

    while ($row = $stmtReviews->fetch(PDO::FETCH_ASSOC)){
        
        $reviewsStat_arr=array(
        	"total" => $row['TOTAL'],
        	"average_total" => $row['AVE_TOTAL'],
            "quality" => $row['quality'],
            "reliability" => $row['reliability'],
            "cost" => $row['cost'],
            "schedule" => $row['schedule'],
            "behaviour" => $row['behaviour'],
            "cleaniness" => $row['cleanliness']
        );
        //array_push($reviewsStat_arr, $reviews_item);
    }
   
}else{
   $reviewsStat_arr = array(); 
}

$stmtProfPhotos = $professional->getPhotos();
$numPhotos = $stmtProfPhotos->rowCount();
if($numPhotos >= 1){
    $photos_arr = array();

    while ($row = $stmtProfPhotos->fetch(PDO::FETCH_ASSOC)){
        
        $photos_item=array(
        	"id" => $row['id'],
        	"image_name" => $row['image_name']
        );
        array_push($photos_arr, $photos_item);
    }
   
}else{
   $photos_arr = array(); 
}

$applications_arr = array();
while ($row = $stmtApplications->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $application_item=array(
    	"id" => $id,
    	"application_name" => $title_greek,
        "category_name" => $name_greek,
        "category_id" => $category_id,
        "price" => $price,
        "unit" => $unit,
        "prof_description" => $description,
        "app_description" => $detail_description_gr,
        "budget" => $budget
    );
    array_push($applications_arr, $application_item);
}

$payment = new Payment($db);
$percentage = $payment->get_percentage($_GET['id']);
//$professional_arr['percentage'] = $percentage;
 
$professional_arr=array(
    "id" => $professional->id,
    "first_name" => $professional->first_name,
    "last_name" => $professional->last_name,
    "sex" => $professional->sex,
    "address" => $professional->address,
    "city" => $professional->city,
    "service_area" => $professional->service_area,
    "image" => $professional->image,
    "description" => $professional->description,
    "county_id" => $professional->county_id,
    "profile_status" => $professional->profile_status,
    "mobile" => $professional->mobile,
    "phone" => $professional->phone,
    "email" => $professional->email,
    "calendar_id" => $professional->calendar_id,
    "admin_comments" => $professional->admin_comments,
    "viewtype" => $professional->viewtype,
    "verified" => $professional->verified,
    "image1" => $professional->image1,
    "image2" => $professional->image2,
    "image3" => $professional->image3,
    "perid1" => $professional->perid1,
    "perid2" => $professional->perid2,
    "agreement1" => $professional->agreement1,
    "agreement2" => $professional->agreement2,
    "agreement3" => $professional->agreement3,
    "agreement4" => $professional->agreement4,
    "agreement5" => $professional->agreement5,
    "approve_per" => $professional->approve_per,
    "approve_doc" => $professional->approve_doc,
    "percentage" => $percentage,
    "photos" => $photos_arr,
    "applications" => $applications_arr,
    "categories"   => $getCategories,
    "counties"   => $getConties,
    "reviews_stats" => $reviewsStat_arr,
    "reviews" => $reviews_arr
);
   
    

    echo json_encode($professional_arr);
?>