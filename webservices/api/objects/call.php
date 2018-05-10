<?php
class Call{
 
    // database connection and table name
    private $conn;
    private $table_name = "calls";
    private $application_table_name = "applications";
    private $ratings_table_name = "directory_ratings";
 
    // object properties
    public $id;
    public $about;
    public $name;
    public $surname;
    public $date;
    public $duration;
    public $agent_id;
    public $mobile;
    public $land_line;
    public $rconrding;
    public $comment;
    public $datetimeCreated;
    public $status;
    public $uuid_ivr;
    public $call_status;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT `id`, `about`, `date`, `duration`, `agent_id`, `name`,  `surname`, `mobile`, `land_line`, `rconrding`, `comment`, `datetimeCreated`, `status`, `uuid_ivr`, `call_status` 
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    function readOne($callid){

     
        // query to read single record
        $query = "SELECT `id`, `about`, `date`, `duration`,`name`, `surname`, `mobile`, `land_line`, `rconrding`, `comment`, `call_status`
                FROM
                    " . $this->table_name . " 
                WHERE
                    id = ". $callid ."
                LIMIT
                    0,1";
     
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
     //echo $this->id." ------ ";

     $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        $num = $stmt->rowCount();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->about = $row['about'];
        $this->name = $row['name'];
        $this->surname = $row['surname'];
        $this->date = $row['date'];
        $this->duration = $row['duration'];
        $this->mobile = $row['mobile'];
        $this->land_line = $row['land_line'];
        $this->rconrding =$row['rconrding'];
        $this->comment = $row['comment'];
        $this->call_status = $row['call_status'];

    } // Read One


    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT `id`, `about`, `date`, `duration`, `name`, `surname`, `agent_id`, `mobile`, `land_line`, `rconrding`, `comment`, `datetimeCreated`, `status`, `uuid_ivr`, `call_status` 
                FROM
                    " . $this->table_name . " WHERE `status`=1 OR `status`=0
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
    
    public function create($CallId, $commentcall){
        $query = "UPDATE `calls` SET `comment`= '".$commentcall."' WHERE `id`='".$CallId."'";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return "1";
    }

    public function createschedule($calldatetime, $Customersmobile, $agent_id){

        $query = "INSERT INTO `call_outbound_schedule`(`mobile`, `callTime`, `agent_id`) VALUES ('".$Customersmobile."','".$calldatetime."','".$agent_id."')";
        
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        
        return "1";
    }

}
?>