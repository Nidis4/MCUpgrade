<?php
class Appointment{
 
    // database connection and table name
    private $conn;
    private $table_name = "appointments";
    private $application_table_name = "applications";
    private $ratings_table_name = "directory_ratings";
    private $customers_table_name = "customers";
    private $customers_contact_table_name = "customers_contact_details";
    private $customers_account_table_name = "customers_account_info";
 
    // object properties
    public $id;
    public $prof_member_id;
    public $cust_member_id;
    public $application_id;
    public $county_id;
    public $date;
    public $time;
    public $address;
    public $budget;
    public $commision;
    public $agent_id;
    public $comment;
    public $sms;
    public $sms_log_id;
    public $datetimeCreated;
    public $datetimeStatusUpdated;
    public $sourceAppointmentId;
    public $status;
    public $cancelComment;
    public $customer_first_name;
    public $customer_last_name;
    public $category_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    function readOne(){
     
        // query to read single record
        $query = "SELECT
                    a.`id`, a.`prof_member_id`, a.`cust_member_id`, a.`application_id`,a.`county_id`, a.`date`, a.`time`, a.`address`, a.`budget`, a.`commision`, a.`agent_id`, a.`comment`, a.`sms`, a.`sms_log_id`,  a.`datetimeCreated`, a.`datetimeStatusUpdated`, a.`sourceAppointmentId`, a.`status`, a.`cancelComment`, ap.`category_id`, ac.`first_name` as customer_first_name, ac.`last_name` as customer_last_name, ac.`sex` as customer_sex, cc.`address` as customer_address, cc.`phone` as customer_phone, cc.`mobile` as customer_mobile, ca.`email` as customer_email
                FROM
                    " . $this->table_name . " a
                LEFT JOIN ". $this->application_table_name." ap 
                    ON a.application_id = ap.id
                LEFT JOIN ". $this->customers_table_name." ac 
                    ON a.cust_member_id = ac.id
                LEFT JOIN ". $this->customers_contact_table_name." cc 
                    ON a.cust_member_id = cc.customer_id
                LEFT JOIN ". $this->customers_account_table_name." ca 
                    ON a.cust_member_id = ca.customer_id
                WHERE
                    a.id = :id
                LIMIT
                    0,1";
     
     //echo $query;
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
        $this->prof_member_id = $row['prof_member_id'];
        $this->cust_member_id = $row['cust_member_id'];
        $this->application_id = $row['application_id'];
        $this->county_id = $row['county_id'];
        $this->date = $row['date'];
        $this->time = $row['time'];
        $this->address = $row['address'];
        $this->budget = $row['budget'];
        $this->commision =$row['commision'];
        $this->agent_id = $row['agent_id'];
        $this->comment = $row['comment'];
        $this->sms = $row['sms'];
        $this->sms_log_id = $row['sms_log_id'];
        $this->datetimeCreated = $row['datetimeCreated'];
        $this->datetimeStatusUpdated = $row['datetimeStatusUpdated'];
        $this->sourceAppointmentId = $row['sourceAppointmentId'];
        $this->status = $row['status'];
        $this->cancelComment = $row['cancelComment'];
        $this->category_id = $row['category_id'];
        $this->customer_first_name = $row['customer_first_name'];
        $this->customer_last_name = $row['customer_last_name'];
        $this->customer_sex = $row['customer_sex'];
        $this->customer_address = $row['customer_address'];
        $this->customer_phone = $row['customer_phone'];
        $this->customer_mobile = $row['customer_mobile'];
        $this->customer_email = $row['customer_email'];

    } // Read One

    function cancelAppointment($cancelReason = NULL, $cancelComment = NULL){


        if(@$cancelReason){

        }else{
            $cancelReason = 0;
        }

        if(@$cancelComment){

        }else{
            $cancelComment = "";
        }

        // query to read single record
        $query = "UPDATE " . $this->table_name . "
                    SET
                    `status`=0, `cancelReason`= :cancelReason, `cancelComment`= :cancelComment ,`datetimeStatusUpdated` ='".date('Y-m-d H:i:s')."'
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        $stmt->bindParam(':cancelReason',  $cancelReason, PDO::PARAM_INT);
        $stmt->bindParam(':cancelComment',  $cancelComment);

        if ($stmt->execute()) { 
            
           return 1;
        } else {
            
           return 0;
        }
    } // CancelAppointment

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `county_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`
                FROM
                    " . $this->table_name . " WHERE `status`!=2
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

    // read products with pagination for Customer
    public function readPagingByCust($from_record_num, $records_per_page, $cust_id){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`
                FROM
                    " . $this->table_name . " WHERE `cust_member_id`= ? AND (`status`=1 OR `status`=0)
                ORDER BY `datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $cust_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    // read products with pagination for Customer
    public function readPagingByProf($from_record_num, $records_per_page, $prof_id){
     
        // select query
        $query = "SELECT
                    `id`, `prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`,  `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelReason`, `cancelComment`
                FROM
                    " . $this->table_name . " WHERE `prof_member_id`= ? AND (`status`=1 OR `status`=0)
                ORDER BY `datetimeCreated` DESC
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

    // read products with pagination for Agent
    public function readPagingByAgent($from_record_num, $records_per_page, $agent_id){
     
        // select query
        $query = "SELECT
                    a.`id`, a.`prof_member_id`, a.`cust_member_id`, ap.`category_id`, a.`application_id`, a.`date`, a.`time`, a.`address`, a.`budget`, a.`commision`, a.`agent_id`, a.`comment`, a.`sms`, a.`sms_log_id`, a.`datetimeCreated`, a.`datetimeStatusUpdated`, a.`sourceAppointmentId`, a.`status`, a.`cancelReason`, a.`cancelComment`
                FROM
                    " . $this->table_name . " a 
                    LEFT JOIN ". $this->application_table_name." ap
                    ON a.application_id = ap.id WHERE a.`agent_id`= ? And a.`date` < '" .date("Y-m-d")."'  AND a.`status`= 1 and a.`id` NOT IN (SELECT appointment_id FROM `directory_ratings` WHERE appointment_id >=1) 
                ORDER BY a.`datetimeCreated` DESC
                LIMIT ?, ?";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $stmt->bindParam(1, $agent_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);
     
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

    public function create($prof_id, $cust_id, $application_id, $county_id, $date, $time, $address, $budget, $commision, $agent_id, $comment, $status){
        $query = "INSERT INTO `appointments`(`prof_member_id`, `cust_member_id`, `application_id`,`county_id`,  `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`) VALUES ('$prof_id', '$cust_id', '$application_id','$county_id', '$date', '$time', '$address', '$budget','$commision', '$agent_id','$comment','0','0', NOW(),NOW(),'0','$status','')";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        //return "INSERT INTO `appointments`(`prof_member_id`, `cust_member_id`, `application_id`, `date`, `time`, `address`, `budget`, `commision`, `agent_id`, `comment`, `sms`, `sms_log_id`, `googleEventId`, `datetimeCreated`, `datetimeStatusUpdated`, `sourceAppointmentId`, `status`, `cancelComment`) VALUES ('$prof_id', '$cust_id', '$application_id', '$date', '$time', '$address', '$budget','$commision', 'agent_id','comment','0','0','0', NOW(),NOW(),'0','0','')";
        return "1";
    }

    public function rejectByProf($id, $prof_member_id){


        //var getAvailableAPI = API_LOCATION+'professional/getCalendarForBooking.php?duration='+duration+'&county_id='+county+'&application_id='+application+'&startDate='+startDate+'&endDate='+endDate+'&address='+address;
    }

    function getStatusInfo(){

        $query = "SELECT * FROM `appointments_status` WHERE `ID` = :id ";
        $stmt = $this->conn->prepare( $query );
        $status_id = $this->status;
        $stmt->bindParam(':id',  $status_id, PDO::PARAM_INT);

        $stmt->execute();
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt;

    }

    public function getStatusName($id){

        $query = "SELECT `NAME` FROM `appointments_status` WHERE `ID` = $id ";
        $stmt = $this->conn->prepare( $query );

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['NAME'];
    }


}
?>