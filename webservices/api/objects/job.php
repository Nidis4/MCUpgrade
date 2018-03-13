<?php
class Job{
 
    // database connection and table name
    private $conn;
    private $table_name = "jobs";
 
    // object properties
    public $id;

    public function __construct($db){
        $this->conn = $db;
    }
 

    function add($category_id, $title, $budget, $offers, $email, $questions, $phone){

        $query = "INSERT INTO " . $this->table_name . " (`category_id`, `email`, `title`, `budget`, `offers`, `offer_balance`, `questions`, `phone`, `datetimeCreated`) VALUES ($category_id, '".$email."', '".$title."', '".$budget."', '".$offers."', '".$offers."', '".$questions."', '".$phone."', NOW())";

        $stmt = $this->conn->prepare( $query );

        if($stmt->execute()){
            $id = $this->conn->lastInsertId();

            return $id;  
        }

        return 0;
        
        

    } // Save Job

    

    
}
?>