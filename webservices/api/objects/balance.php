<?php
class Balance{
 
    // database connection and table name
    private $conn;
    private $appointment_table_name = "appointments";
    private $applications_table_name = "applications";
    private $professionals_table_name = "professionals";
    private $payments_table_name = "payments";
    private $category_table_name = "categories";
    private $admin_table_name = "admin";

 
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

    public function professionals($from, $to){


        $query = "SELECT
                    a.`prof_member_id` AS professionalId,CONCAT(p.`last_name`,' ', p.`first_name`) AS professionalName, SUM(a.`commision`) AS Appointments_totalCommission
                FROM
                    " . $this->appointment_table_name . " a
                INNER JOIN ". $this->professionals_table_name." p
                    ON a.prof_member_id = p.id 
                Where a.date >= '".$from."' and a.date <= '".$to."' and a.status=1
                Group By a.prof_member_id
                ";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function payments($from, $to){


        $query = "SELECT
                    a.`professional_id` AS professionalId,CONCAT(p.`last_name`,' ', p.`first_name`) AS professionalName, a.`amount`, a.`type`, a.`datetime_added`
                FROM
                    " . $this->payments_table_name . " a
                INNER JOIN ". $this->professionals_table_name." p
                    ON a.professional_id = p.id 
                Where a.datetime_added >= '".$from."' and a.datetime_added <= '".$to."' and a.status=1
                 order by a.datetime_added desc";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function categories($from, $to){


        $query = "SELECT c.`id` AS categoryId, c.`title` as category_title, c.`title_greek` as category_title_greek, SUM(a.commision) AS Appointments__totalCommission
                FROM
                    " . $this->appointment_table_name . " a
                INNER JOIN ". $this->applications_table_name." ap
                    ON a.application_id = ap.id 
                INNER JOIN ". $this->category_table_name." c
                    ON ap.category_id = c.id 
                Where a.date >= '".$from."' and a.date <= '".$to."' and a.status=1
                Group By c.id
                ";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

        public function agents($from, $to){


        $query = "SELECT a.`agent_id` AS agentId, CONCAT(ad.`first_name`,' ' , ad.`last_name`) AS agentName, SUM(a.commision) AS Appointments__totalCommission
                FROM
                    " . $this->appointment_table_name . " a
                INNER JOIN ". $this->admin_table_name." ad
                    ON a.agent_id = ad.id
                Where a.date >= '".$from."' and a.date <= '".$to."' and a.status=1
                Group By a.agent_id
                ";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
   


}
?>