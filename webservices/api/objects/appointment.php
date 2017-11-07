<?php
class Appointment{
 
    // database connection and table name
    private $conn;
    private $table_name = "appointments";
 
    // object properties
    public $id;
    public $prof_member_id;
    public $cust_member_id;
    public $application_id;
    public $date;
    public $time;
    public $address;
    public $budget;
    public $commision;
    public $agent_id;
    public $comment;
    public $sms;
    public $sms_log_id;
    public $googleEventId;
    public $datetimeCreated;
    public $datetimeStatusUpdated;
    public $sourceAppointmentId;
    public $status;
    public $cancelComment;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){
     
        // query to read single record
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
     
     echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
     echo $this->id." ------ ";

     $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(1, $cur_id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->prof_member_id = $row['prof_member_id'];
        $this->cust_member_id = $row['cust_member_id'];
        $this->application_id = $row['application_id'];
        $this->date = $row['date'];
        $this->time = $row['time'];
        $this->address = $row['address'];
        $this->budget = $row['budget'];
        $this->commision =$row['commision'];
        $this->agent_id = $row['agent_id'];
        $this->comment = $row['comment'];
        $this->sms = $row['sms'];
        $this->sms_log_id = $row['sms_log_id'];
        $this->googleEventId = $row['googleEventId'];
        $this->datetimeCreated = $row['datetimeCreated'];
        $this->datetimeStatusUpdated = $row['datetimeStatusUpdated'];
        $this->sourceAppointmentId = $row['sourceAppointmentId'];
        $this->status = $row['status'];
        $this->cancelComment = $row['cancelComment'];

    }


}
?>