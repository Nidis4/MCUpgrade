<?php
class Country{
 
    // database connection and table name
    private $conn;
    private $table_name = "countries";
 
    // object properties
    public $id;
    public $country_name;
    public $country_name_greek;
    public $countries_iso_code_2;
    public $countries_iso_code_3;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, country_name, country_name_greek, countries_iso_code_2, countries_iso_code_3
                FROM
                    " . $this->table_name . "
                ORDER BY
                    country_name ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }


    function readOne(){
     
        // query to read single record
        $query = "SELECT
                id, country_name, country_name_greek, countries_iso_code_2, countries_iso_code_3
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
        $this->country_name = $row['country_name'];
        $this->country_name_greek = $row['country_name_greek'];
        $this->countries_iso_code_2 = $row['countries_iso_code_2'];
        $this->countries_iso_code_3 = $row['countries_iso_code_3'];
    } // Read One
}
?>