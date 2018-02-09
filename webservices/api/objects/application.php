<?php
class Application{
 
    // database connection and table name
    private $conn;
    private $table_name = "applications";
    private $table_search = "applications_search";
 
    // object properties
    public $id;
    public $category_id;
    public $title;
    public $title_greek;
    public $short_description;
    public $short_description_gr;
    public $detail_description;
    public $detail_description_gr;
    public $unit;
    public $min_price;
    public $sequence;
    public $modified;

 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    id, category_id, title, title_greek, short_description, short_description_gr, detail_description, detail_description_gr, unit, min_price, sequence, modified
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    function readByCategory(){
     
        // query to read single record
        $query = "SELECT
                    id, category_id, title, title_greek, short_description, short_description_gr, detail_description, detail_description_gr, unit, min_price, sequence, modified
                FROM
                    " . $this->table_name . "
                WHERE
                    category_id = :cat_id
                ORDER BY
                    title_greek ASC";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->category_id;
        // bind id of product to be updated
        $stmt->bindParam(':cat_id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        return $stmt;

    } // Read One

    function search($term){

        //addSearchTerm($term);

        $query = "SELECT s.`application_id`, a.`title_greek` 
                FROM
                    `applications_search` s, `applications` a
                WHERE
                    (s.`tags` LIKE '%$term%' OR a.`title_greek` LIKE '%$term%')

                AND
                    s.`application_id` = a.`id`
                ORDER BY
                    a.`title_greek` ASC";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function addSearchTerm($term){
        $query = "INSERT INTO applications_search_terms (term, counts)
                    VALUES ('$term',1) 
                    ON DUPLICATE KEY
                    UPDATE counts=counts+1;";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();
    }

}
?>