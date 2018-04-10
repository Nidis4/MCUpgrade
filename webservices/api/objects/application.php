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
    public $tags;

 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function read(){
        //select all data
        $query = "SELECT
                    a.id, a.category_id, a.title, a.title_greek, a.short_description, a.short_description_gr, a.detail_description, a.detail_description_gr, a.unit, a.min_price, a.sequence, a.modified, ast.tags
                FROM
                    " . $this->table_name . " a,  " . $this->table_search . " ast 
                WHERE a.id = ast.application_id
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }



    function readOne(){
     
        // query to read single recordALTER TABLE `professionals` ADD `service_area` VARCHAR(200) NOT NULL AFTER `description`;

        $query = "SELECT
                    a.id, a.category_id, c.name_greek, a.title, a.title_greek, a.short_description, a.short_description_gr, a.detail_description, a.detail_description_gr, a.unit, a.min_price, a.sequence, a.modified
                FROM
                    " . $this->table_name . " a,
                    `categories` c
                WHERE
                    a.id = :app_id AND
                    a.`category_id`=c.`id`
                ORDER BY
                    title_greek ASC";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':app_id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        return $stmt;

    } 

    function getProfessionalsByApplication($id){
     
        // query to read single record
        $query = "SELECT p.id, p.first_name, p.last_name, p.image,p.service_area, pa.description, pa.budget, pa.price, pc.city, pou.county_id, cou.county_name_gr
                    FROM `professionals` p
                    LEFT JOIN `professionals_applications` pa ON p.`id`=pa.`professional_id`
                    LEFT JOIN `professionals_contact_details` pc ON p.`id`=pc.`professional_id` AND pa.`professional_id`=pc.`professional_id`
                    LEFT JOIN `professionals_counties` pou ON p.`id`=pou.`professional_id`
                    LEFT JOIN `counties` cou ON cou.`id`=pou.`county_id`
                    WHERE pa.`application_id`=:app_id AND pa.`price` > 0 
                    ORDER BY pa.`price`, p.id ASC";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;
        // bind id of product to be updated
        $stmt->bindParam(':app_id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        return $stmt;

    } 

    function readByCategory(){
     
        // query to read single record
        $query = "SELECT
  applications.id,
  applications.category_id,
  categories.name_greek,
  applications.`title`,
  applications.`title_greek`,
  applications.`short_description`,
  applications.`short_description_gr`,
  applications.`detail_description`,
  applications.`detail_description_gr`,
  applications.`unit`,
  applications.`min_price`,
  applications.`sequence`,
  applications.`modified`,
  COUNT(professionals_applications.application_id) AS total
FROM
  applications
LEFT JOIN professionals_applications ON applications.id = professionals_applications.application_id
LEFT JOIN categories ON categories.id = applications.category_id
WHERE professionals_applications.price >0 AND applications.category_id=:cat_id
GROUP BY applications.id
ORDER BY applications.sequence ASC";
     
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

    function updateTag($id, $tags){
        $query = "UPDATE `applications_search` SET `tags`='$tags' WHERE `application_id` = $id";
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();
        return $stmt;
    }

}
?>