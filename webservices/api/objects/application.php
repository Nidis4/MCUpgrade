<?php
class Application{
 
    // database connection and table name
    private $conn;
    private $table_name = "applications";
    private $table_search = "applications_search";
    private $table_meta = "applications_meta";
 
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
                    a.id, a.category_id, a.title, a.title_greek, a.short_description, a.short_description_gr, a.detail_description, a.detail_description_gr, a.category_description, a.unit, a.min_price, a.sequence, a.modified, ast.tags, m.meta_title, m.meta_description, m.meta_robots, m.permalink
                FROM
                    " . $this->table_name . " a  
                LEFT JOIN " . $this->table_search . " ast ON a.id = ast.application_id
                LEFT JOIN " . $this->table_meta . " m ON a.id = m.application_id
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
        $query = "SELECT p.id, p.first_name, p.last_name, p.image,p.service_area, pa.description, pa.budget, pa.price, pc.city, m.permalink
                    FROM `professionals` p
                    LEFT JOIN `professionals_applications` pa ON p.`id`=pa.`professional_id`
                    LEFT JOIN `professionals_contact_details` pc ON p.`id`=pc.`professional_id` AND pa.`professional_id`=pc.`professional_id`
                    LEFT JOIN `professionals_meta` m ON p.`id`=m.`professional_id`
                    WHERE p.verified=1 AND pa.`application_id`=:app_id AND pa.`price` > 0 
                    ORDER BY pa.`price`, p.id ASC";
     
     //echo $query;
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

    function readAppMeta($app_id){
        $query ="SELECT * FROM applications_meta WHERE application_id ='".$app_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    function read_app_id($permalink){
        $query ="SELECT * FROM applications_meta WHERE permalink ='".$permalink."'";
        $stmt = $this->conn->prepare( $query );
     
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->application_id = $row['application_id'];
        $this->meta_title = $row['meta_title'];
        $this->meta_description = $row['meta_description'];
        $this->meta_robots = $row['meta_robots'];
        $this->permalink = $row['permalink'];
    }


    function readByCategory(){
     
        // query to read single record
        $query = "SELECT
  applications.id,
  applications.category_id,
  categories.name_greek,
  categories.image_loc,
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
  applications_meta.`permalink`,
  COUNT(professionals_applications.application_id) AS total,
  MIN(professionals_applications.price) AS minimum_price
FROM
  applications
LEFT JOIN professionals_applications ON applications.id = professionals_applications.application_id
LEFT JOIN categories ON categories.id = applications.category_id
LEFT JOIN professionals ON professionals.id = professionals_applications.professional_id
LEFT JOIN applications_meta ON applications.id = applications_meta.application_id
WHERE professionals_applications.price >0 AND applications.category_id=:cat_id AND professionals.verified=1
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


        $query = "SELECT s.`application_id`, a.`title_greek` , a.`category_id`, c.`image_loc`
                FROM
                    `applications_search` s, `applications` a, `categories` c
                WHERE
                    (s.`tags` LIKE '%$term%' OR a.`title_greek` LIKE '%$term%')
                AND
                    s.`application_id` = a.`id`
                AND
                    a.`category_id` = c.`id`
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

    function updateTag($id, $meta_title, $meta_description, $meta_robots, $permalink, $tags, $category_description){
        $query = "UPDATE `applications_search` SET `tags`='$tags' WHERE `application_id` = $id";
        $stmt = $this->conn->prepare( $query );
        // execute query
        $stmt->execute();

        $query = "UPDATE `applications` SET `category_description`='$category_description' WHERE `id` = $id";
        $stmt = $this->conn->prepare( $query );
        // execute query
        $stmt->execute();

        $query = "INSERT INTO `applications_meta`(`application_id`, `meta_title`, `meta_description`, `meta_robots`, `permalink`) VALUES ('".$id."', '".$meta_title."', '".$meta_description."', '".$meta_robots."', '".$permalink."') ON DUPLICATE KEY UPDATE `meta_title`= '".$meta_title."' , `meta_description`= '".$meta_description."', `meta_robots`= '".$meta_robots."', `permalink`= '".$permalink."'  ";
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();
        return $stmt;
    }

}
?>