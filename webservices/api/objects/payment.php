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

    public function save($professional_id, $category_id, $amount, $agent_id, $comment, $type, $bank_name, $datetime_added, $issuetype ){

        $invoice_no = "";
        $receipt_no = "";

        if(@$issuetype){
            $q = "Select Count(`id`) as itotal from ". $this->table_name . " where `issuetype` = '".$issuetype."'";
            $s = $this->conn->prepare( $q );
            $s->execute();
            $t = $s->fetch();
            $count = $t['itotal'];
            if($issuetype == "Invoice"){
               $invoice_no =  intval($count) + 1;
            }else{
               $receipt_no =  intval($count) + 1; 
            }
            
        }

        $query = "INSERT INTO " . $this->table_name . " (`professional_id`, `category_id`, `amount`, `agent_id`, `comment`, `type`, `bank_name`, `datetime_added`,`issuetype`,`invoice_no`,`receipt_no`) VALUES ('".$professional_id."', '".$category_id."', '".$amount."', '".$agent_id."', '".$comment."', '".$type."', '".$bank_name."', '".$datetime_added."', '".$issuetype."', '".$invoice_no."', '".$receipt_no."')";
        
        $stmt = $this->conn->prepare( $query );

        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    }

    public function get_percentage($professional_id){
         // select query
        $query = "SELECT SUM(amount) AS percentage FROM ".$this->table_name." WHERE professional_id = '".$professional_id."' AND status = '1' AND datetime_added  BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        
        
        // execute query
        $stmt->execute();
        $percentage = $stmt->fetch();
        if(@$percentage['percentage']){
            
            $query1 = "SELECT SUM(budget) AS percentage FROM appointments WHERE prof_member_id = '".$professional_id."' AND `status` IN('1','0') AND `cancelReason` IN('0','2') AND `date` BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
     
            // prepare query statement
            $stmt1 = $this->conn->prepare( $query1 );
            
            // execute query
            $stmt1->execute();
            $percentage2 = $stmt1->fetch();
            if(@$percentage2['percentage']){
                $return = number_format((($percentage['percentage']/$percentage2['percentage'])*100),2)."%";
                return $return;
            }else{
                return '0.0%';
            }
        }else{
            return '0.0%';
        }
        
    }
}
?>