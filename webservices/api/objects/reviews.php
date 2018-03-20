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

        // read products with pagination for Customer
    public function readPagingByProf($from_record_num, $records_per_page, $prof_id){
     
        // select query
        $query = "SELECT
                    `id`, `professional_id`, `customer_id`, `agent_id`, `appointment_id`, `category_id`, `job_title`, `quality`, `reliability`, `cost`, `schedule`, `behaviour`, `cleanliness`,  `professional_comment`, `comment`, `created`
                FROM
                    " . $this->table_name . " WHERE `professional_id`= ? 
                ORDER BY `created` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $prof_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function countProf($prof_id){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . " where professional_id = '".$prof_id."'";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function getCategoryByID($id){
        $query = "SELECT * FROM categories WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row;
    }

    public function getProfessionalNameByID($id){
        $query = "SELECT first_name, last_name FROM professionals WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['first_name']." ".$row['last_name'];
    }

    public function getCustomerNameByID($id){
        $query = "SELECT first_name, last_name FROM customers WHERE `id`=".$id."";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['first_name']." ".$row['last_name'];
    }

    public function readAvgByProf($prof_id){
        // select query
        $query = "SELECT count(id) as total, AVG(quality) as quality_avg, AVG(reliability) as reliability_avg, AVG(cost) as cost_avg, AVG(`schedule`) as schedule_avg, AVG(behaviour) as behaviour_avg, AVG(cleanliness) as cleanliness_avg  FROM `directory_ratings` WHERE `professional_id` = ? GROUP BY professional_id";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $prof_id, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;   
    }

}
?>