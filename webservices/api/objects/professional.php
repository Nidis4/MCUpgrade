<?php
class Professional{
 
    // database connection and table name
    private $conn;
    private $table_name = "professionals";
    private $contact_table_name = "professionals_contact_details";
    private $account_table_name = "professionals_account_info";
    private $counties_table_name = "professionals_counties";
    private $applications_table_name = "professionals_applications";
 
    // object properties
    public $professional_id;
    public $address;
    public $area;
    public $city;
    public $country_id;
    public $latitude;
    public $longtitude;
    public $mobile;
    public $phone;
    public $postcode;
    public $county_id;
    public $calendar_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function contactDetails(){
        //select all data
        $query = "SELECT
                    `professional_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longtitude`, `postcode`, `phone`, `mobile`
                FROM
                    " . $this->contact_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function accountInfo(){
        //select all data
        $query = "SELECT
                    `professional_id`, `email`, `password`, `last_login`, `last_login_ip`, `modified`, `status`, `user_type`, `created`
                FROM
                    " . $this->account_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function available(){
        $query = "SELECT p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, co.`address` FROM `professionals` p, `professionals_counties` c, `professionals_applications` a, `professionals_contact_details` co WHERE c.professional_id=p.id AND a.professional_id=p.id AND co.professional_id=p.id  AND c.county_id= :county AND a.application_id=:application ";

        $stmt = $this->conn->prepare( $query );

        $county_id = $this->county_id;
        $application_id = $this->application_id;
        $stmt->bindParam(':county',  $county_id, PDO::PARAM_INT);
        $stmt->bindParam(':application',  $application_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }



    public function busySlots($startDate, $endDate, $id){
        $query ="SELECT `date`,`time`, `address` FROM `appointments` WHERE `prof_member_id`=".$id." AND `status`=1 AND `date` BETWEEN '".$startDate."' AND '".$endDate."'  ORDER BY `date`";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

     public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT
                p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, p.`admin_comments`, co.`address`, co.`mobile`, co.`phone` FROM `professionals` p,  `professionals_contact_details` co WHERE co.professional_id=p.id 
                ORDER BY
                    p.`id` DESC
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

    public function getApplications(){
     
        // select query
        $query = "SELECT c.name_greek, a.title_greek FROM `professionals_applications` po, `categories` c, `applications` a WHERE `professional_id`= ? AND po.category_id=c.id AND po.application_id = a.id";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $id = $this->id;
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function searchList($name, $surname, $mobile, $address){
 
    // select all query
    $query = "SELECT
                p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, p.`admin_comments`, co.`address`, co.`mobile`, co.`phone`
            FROM
                " . $this->table_name . " p
                LEFT JOIN ". $this->contact_table_name." co
                    ON p.id = co.professional_id
            WHERE
                p.first_name LIKE ? AND p.last_name LIKE ? AND co.mobile LIKE ? AND co.address LIKE ?
            ORDER BY
                    p.`id` DESC
                LIMIT 0, 30";

                //echo $query;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $name=htmlspecialchars(strip_tags($name));
    $name = "%{$name}%";
    $surname=htmlspecialchars(strip_tags($surname));
    $surname = "%{$surname}%";
    $mobile=htmlspecialchars(strip_tags($mobile));
    $mobile = "%{$mobile}%";
    $address=htmlspecialchars(strip_tags($address));
    $address = "%{$address}%";
 
    // bind
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $surname);
    $stmt->bindParam(3, $mobile);
    $stmt->bindParam(4, $address);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    }

    // used for paging 
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function readOne(){
     
        // query to read single record
        $query = "SELECT
                 p.`id`, p.`first_name`, p.`last_name`, p.`sex`, p.`profile_status`, p.`admin_comments`, co.`address`, co.`mobile`, co.`phone`, ca.`email`, ca.`calendar_id`
            FROM
                " . $this->table_name . " p
                LEFT JOIN ". $this->contact_table_name." co
                    ON p.id = co.professional_id
                LEFT JOIN ". $this->account_table_name." ca
                    ON p.id = ca.professional_id
                WHERE
                    p.id = :id
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
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->address = $row['address'];
        $this->sex = $row['sex'];
        $this->profile_status = $row['profile_status'];
        $this->admin_comments = $row['admin_comments'];
        $this->mobile = $row['mobile'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->calendar_id = $row['calendar_id'];
    } // Read One
}
?>