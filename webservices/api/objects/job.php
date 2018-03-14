<?php
class Job{
 
    // database connection and table name
    private $conn;
    private $table_name = "jobs";
    private $address_table_name = "jobs_address";
 
    // object properties
    public $id;

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
}
?>