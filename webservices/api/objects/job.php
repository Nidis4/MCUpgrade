<?php
class Job{
 
    // database connection and table name
    private $conn;
    private $table_name = "jobs";
    private $address_table_name = "jobs_address";
    private $customer_table_name = "customers";
 
    // object properties
    public $id;
    public $customer_id;
    public $category_id;
    public $email;
    public $title;
    public $budget;
    public $offers;
    public $offer_balance;
    public $questions;
    public $phone;
    public $datetimeCreated;

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



    function update_address($id, $city, $county, $country, $postcode, $lat, $long){
        /*$query = "UPDATE " . $this->contact_table_name . "
                    SET
                    `mobile`=:mobile, `phone`=:phone, `address`=:address";
        
        $query .=" WHERE customer_id = :id";*/

        $query = "INSERT INTO ". $this->address_table_name ." (`job_id`, `city`, `county_id`, `country_id`, `postcode`, `latitude`, `longitude`) VALUES (:id, :city, :county, :country, :postcode, :latitude, :longitude) ON DUPLICATE KEY UPDATE `city`=:city, `county_id`=:county, `country_id`=:country, `postcode`=:postcode, `latitude`=:latitude, `longitude`=:longitude";
    
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':city',  $city);
        $stmt->bindParam(':county',  $county);
        $stmt->bindParam(':country',  $country);
        $stmt->bindParam(':postcode',  $postcode);
        $stmt->bindParam(':latitude',  $lat);
        $stmt->bindParam(':longitude',  $long);
        
        if ($stmt->execute()) { 
           return $id;
        } else {
           return 0;
        }

    }


    function readOne(){
     
        // query to read single record
        $query = "SELECT
                j.`id`, j.`customer_id`, j.`category_id`, j.`email`, j.`title`, j.`budget`, j.`offers`, j.`offer_balance`, j.`questions`, j.`phone`, j.`description`, j.`commission`, j.`charge_admin`, j.`status`, j.`datetimeCreated`, c.`first_name`, c.`last_name`, ja.`city`, ja.`county_id`, ja.`country_id`, ja.`postcode`
                FROM
                " . $this->table_name . " j 
                Left Join ".$this->customer_table_name." c 
                On j.customer_id = c.id 
                Left Join ".$this->address_table_name." ja 
                On j.id = ja.job_id                 
                WHERE
                    j.id = :id
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
        $this->id = $row['id'];
        $this->customer_id = $row['customer_id'];
        $this->category_id = $row['category_id'];
        $this->email = $row['email'];
        $this->title = $row['title'];
        $this->budget = $row['budget'];
        $this->offers = $row['offers'];
        $this->offer_balance = $row['offer_balance'];
        $this->questions = $row['questions'];
        $this->phone = $row['phone'];
        $this->status = $row['status'];
        $this->datetimeCreated = $row['datetimeCreated'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->city = $row['city'];
        $this->county_id = $row['county_id'];
        $this->country_id = $row['country_id'];
        $this->postcode = $row['postcode'];
        $this->description = $row['description'];
        $this->commission = $row['commission'];
        $this->charge_admin = $row['charge_admin'];
    } // Read One


    function update_customer(){

        $query = "UPDATE " . $this->table_name . " set customer_id = :customer_id                
                WHERE id = :id";
     
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        //echo $this->id." ------ ";

        $cur_id = $this->id;
        $customer_id = $this->customer_id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        $stmt->bindParam(':customer_id',  $customer_id, PDO::PARAM_INT);


        $stmt->execute();

        if($stmt){
            return 1;
        }else{
            return 0;
        }

    }

    public function readPaging($from_record_num, $records_per_page){
     
        // select query
        $query = "SELECT 
                j.id, j.customer_id, j.email, j.category_id, j.title, j.budget, j.offers, j.offer_balance, j.questions, j.phone, j.datetimeCreated, c.first_name, c.last_name    
            FROM 
                " . $this->table_name . " j 
                Join ".$this->customer_table_name." c 
                on c.id = j.customer_id  
                WHERE  j.customer_id != ''  
                ORDER BY j.id DESC LIMIT ?, ?";
     
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


    // used for paging 
    public function count(){
        $query = "SELECT COUNT(`id`) as total_rows FROM " . $this->table_name . " where customer_id != ''";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }


    public function searchList($title, $name, $surname, $email){
 
    // select all query
     $query = "SELECT 
                j.id, j.customer_id, j.email, j.category_id, j.title, j.budget, j.offers, j.offer_balance, j.questions, j.phone, j.datetimeCreated, c.first_name, c.last_name 
            FROM 
                " . $this->table_name . " j 
                Join ".$this->customer_table_name." c 
                on c.id = j.customer_id  
            WHERE
                j.customer_id != '' ";

    if(@$title){
        $title=htmlspecialchars(strip_tags($title));
        $title = "%{$title}%";
        $query .= " AND j.title LIKE '".$title ."'";
    }

    if(@$email){
        $email=htmlspecialchars(strip_tags($email));        
        $query .= " AND j.email = '".$email ."'";
    }
    
    if(@$name){
        $name=htmlspecialchars(strip_tags($name));
        $name = "%{$name}%";
        $query .= " AND c.first_name LIKE '".$name ."'";
    }

    if(@$surname){
        $surname=htmlspecialchars(strip_tags($surname));
        $surname = "%{$surname}%";
        $query .= " AND c.last_name LIKE '".$surname ."'";
    }
    
    $query .= " ORDER BY
                    j.`id` DESC
                LIMIT 0, 30";

    //echo $query;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    
    // execute query
    $stmt->execute();
 
    return $stmt;
    }


    function update($job_id, $title, $description, $offers, $budget, $commission, $charge_admin, $email, $questions, $phone){

        $query = "UPDATE " . $this->table_name . " set title = '".$title."',description = '".$description."',offers = '".$offers."',budget = '".$budget."',commission = '".$commission."',charge_admin = '".$charge_admin."',email = '".$email."',questions = '".$questions."',phone = '".$phone."'               
                WHERE id = :id";
     
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        //echo $this->id." ------ ";

        // bind id of product to be updated
        $stmt->bindParam(':id',  $job_id, PDO::PARAM_INT);


        $stmt->execute();

        if($stmt){
            return 1;
        }else{
            return 0;
        }

    }



}
?>