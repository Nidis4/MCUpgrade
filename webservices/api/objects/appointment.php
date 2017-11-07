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


}
?>