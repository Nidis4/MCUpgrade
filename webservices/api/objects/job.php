<?php
class Job{
 
    // database connection and table name
    private $conn;
    private $table_name = "jobs";
    private $address_table_name = "jobs_address";
 
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
                id, customer_id, category_id, email, title, budget, offers, offer_balance, questions, phone, datetimeCreated
                FROM
                " . $this->table_name . "                
                WHERE
                    id = :id
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
        $this->datetimeCreated = $row['datetimeCreated'];
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



}
?>