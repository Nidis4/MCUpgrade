<?php
class Day{
 
    // database connection and table name
    private $conn;
    private $table_name = "days";
 
    // object properties
    public $id;

    public function __construct($db){
        $this->conn = $db;
    }
 

 

    function update($id, $working_hours){
        

        $query = "Update ". $this->table_name ." set `working_hours` = '$working_hours' where id = '".$id."'";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        // $stmt->bindParam(':id',  $id);
        // $stmt->bindParam(':working_hours',  $working_hours);
       
        
        if ($stmt->execute()) {
           return 1;
        } else {
           return 0;
        }
    } // Save Help


    function readPaging(){
        // select query
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
                ORDER BY
                    id
                ";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    function readWorkPaging(){
        // select query
        $query = "SELECT
                *
            FROM
                office_working_hours
                ORDER BY
                    id
                ";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
     
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    

    function save($date, $starttime, $endtime, $holiday){

        $query = "INSERT INTO office_working_hours (`working_date`, `start_time`, `end_time`, `is_holiday`) VALUES (:date, :starttime, :endtime, :holiday)";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        
        $stmt->bindParam(':date',  $date);
        $stmt->bindParam(':starttime',  $starttime);
        $stmt->bindParam(':endtime',  $endtime);
        $stmt->bindParam(':holiday',  $holiday);
        
        if ($as = $stmt->execute()) {
           return 1;
        } else {
           return 0;
        }

    }



    


}
?>