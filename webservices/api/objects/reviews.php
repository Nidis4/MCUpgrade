<?php
class Review{
 
    // database connection and table name
    private $conn;
    private $table_name = "directory_ratings";
 
    // object properties
  
 
    public function __construct($db){
        $this->conn = $db;
    }




    public function save($quality, $reliability, $cost, $schedule, $behaviour, $cleanliness, $professional_id, $customer_id, $appointment_id, $agent_id, $category_id, $comment){

        $query = "INSERT INTO " . $this->table_name . " (`professional_id`, `customer_id`, `agent_id`, `appointment_id`, `category_id`, `quality`, `reliability`, `cost`, `schedule`, `behaviour`, `cleanliness`, `comment`,`active`) VALUES ('".$professional_id."', '".$customer_id."', '".$agent_id."', '".$appointment_id."', '".$category_id."', '".$quality."', '".$reliability."', '".$cost."', '".$schedule."', '".$behaviour."', '".$cleanliness."', '".$comment."', 'yes')";

        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }
}
?>