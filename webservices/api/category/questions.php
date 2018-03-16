<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/category.php';
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);

$category->category_id = isset($_GET['catid']) ? $_GET['catid'] : die();

// query categorys
$stmt = $category->questions();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $question_arr=array();
    //$question_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        
        extract($row);
 
        $question_item=array(
            "id" => $id,
            "question" => $question,
            "question_gr" => $question_gr,
            "seuqence" => $seuqence,
            "option" => $option
        );
        $question_arr['records'][] = $question_item;
        //array_push($question_arr, $question_item);
    }
    $question_arr['error'] = 0;
    echo json_encode($question_arr);
}
 
else{
    echo json_encode(
        array("message" => "No question found.","error" => 1)
    );
}
?>