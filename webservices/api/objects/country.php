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
}
?>