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
 
// query categorys
$stmt = $category->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $categories_arr=array();
    $categories_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $category_item=array(
            "id" => $id,
            "name" => $name,
            "name_greek" => $name_greek,
            "title" => $title,
            "title_greek" => $title_greek,
            "description" => html_entity_decode($description),
            "description_greek" => html_entity_decode($description_greek),
            "sequence" => $sequence,
            "modified" => $modified,
            "commissionRate" => html_entity_decode($commissionRate)
        );
 
        array_push($categories_arr["records"], $category_item);
    }
 
    echo json_encode($categories_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>