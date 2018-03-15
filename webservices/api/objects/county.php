<?php
class County{
 
    // database connection and table name
    private $conn;
    private $table_name = "counties";
 
    // object properties
    public $id;
    public $county_name;
    public $county_name_gr;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, county_name, county_name_gr
                FROM
                    " . $this->table_name . "
                ORDER BY
                    county_name ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    function readOne(){
     
        // query to read single record
        $query = "SELECT
                id, county_name, county_name_gr
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
        $this->county_name = $row['county_name'];
        $this->county_name_gr = $row['county_name_gr'];
    } // Read One
}
?>