<?php
class Payment{
 
    // database connection and table name
    private $conn;
    private $table_name = "payments";
 
    // object properties
    public $payment_id;
    public $professional_id;
    public $category_id;
    public $amount;
    public $agent_id;
    public $comment;
    public $type;
    public $bank_name;
    public $datetime_added;
    public $status;
    public $datetimeStatusUpdated;
    public $cancelComment;
 
    public function __construct($db){
        $this->conn = $db;
    }


    public function paymentByProf(){
     
        // select query
        $query = "SELECT `id`,`category_id`, `amount`, `agent_id`, `comment`, `datetime_added`, `status` FROM ".$this->table_name." WHERE `professional_id` = ? ORDER BY `id` DESC";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $professional_id = $this->professional_id;
        $stmt->bindParam(1, $professional_id, PDO::PARAM_INT);
        
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function save($professional_id, $category_id, $amount, $agent_id, $comment, $type, $bank_name, $datetime_added){

        $query = "INSERT INTO " . $this->table_name . " (`professional_id`, `category_id`, `amount`, `agent_id`, `comment`, `type`, `bank_name`, `datetime_added`) VALUES ('".$professional_id."', '".$category_id."', '".$amount."', '".$agent_id."', '".$comment."', '".$type."', '".$bank_name."', '".$datetime_added."')";

        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }
}
?>