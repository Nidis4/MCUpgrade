<?php
class Professional{
 
    // database connection and table name
    private $conn;
    private $table_name = "professionals";
    private $contact_table_name = "professionals_contact_details";
    private $account_table_name = "professionals_account_info";
    private $document_table_name = "professionals_documents";
    private $counties_table_name = "professionals_counties";
    private $applications_table_name = "professionals_applications";
    private $invoicesettings_table_name = "professionals_invoice_settings";
 
    // object properties
    public $professional_id;
    public $address;
    public $area;
    public $city;
    public $country_id;
    public $latitude;
    public $longtitude;
    public $mobile;
    public $phone;
    public $postcode;
    public $county_id;
    public $calendar_id;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    public function contactDetails(){
        //select all data
        $query = "SELECT
                    `professional_id`, `address`, `area`, `city`, `country_id`, `latitude`, `longtitude`, `postcode`, `phone`, `mobile`
                FROM
                    " . $this->contact_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function accountInfo(){
        //select all data
        $query = "SELECT
                    `professional_id`, `email`, `password`, `last_login`, `last_login_ip`, `modified`, `status`, `user_type`, `created`
                FROM
                    " . $this->account_table_name . "
                ORDER BY
                    id ASC";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function available(){
        $query = "SELECT p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, co.`address` FROM `professionals` p, `professionals_counties` c, `professionals_applications` a, `professionals_contact_details` co WHERE c.professional_id=p.id AND a.professional_id=p.id AND co.professional_id=p.id  AND c.county_id= :county AND a.application_id=:application ";

        $stmt = $this->conn->prepare( $query );

        $county_id = $this->county_id;
        $application_id = $this->application_id;
        $stmt->bindParam(':county',  $county_id, PDO::PARAM_INT);
        $stmt->bindParam(':application',  $application_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }



    public function busySlots($startDate, $endDate, $id){
       
        $query = "SELECT  `date`, `time`, `address` 
FROM
        (
            SELECT `date`,`time`, `address` FROM `appointments` WHERE `prof_member_id`=".$id." AND `status`=1 AND `date` BETWEEN '".$startDate."' AND '".$endDate."'
 UNION   ALL
            SELECT `DATE` as date, `TIME` as time, 'Busy' as address FROM `professionals_busytimes` WHERE `PROFESSIONAL_ID` = ".$id."  AND `DATE` BETWEEN '".$startDate."' AND '".$endDate."'
        ) subquery
ORDER   BY `date` ASC, `time` ASC";
 //$query ="SELECT `date`,`time`, `address` FROM `appointments` WHERE ( `prof_member_id` = ".$id." ) AND (`status` = 1 ) AND (`date` BETWEEN '".$startDate."' AND '".$endDate."')  ORDER BY `date` ASC, `time` ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

     public function readPaging($from_record_num, $records_per_page, $verified){
     
        // select query
        $query = "SELECT
                p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, p.`admin_comments`, co.`address`, co.`mobile`, co.`phone` FROM `professionals` p,  `professionals_contact_details` co WHERE co.professional_id=p.id and p.`verified`='".$verified."'  
                ORDER BY
                    p.`id` DESC
                LIMIT ?, ?";
     
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

    public function getApplications(){
     
        // select query
        $query = "SELECT c.name_greek, po.category_id, a.title_greek FROM `professionals_applications` po, `categories` c, `applications` a WHERE `professional_id`= ? AND po.category_id=c.id AND po.application_id = a.id";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        $id = $this->id;
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        
        // execute query
        $stmt->execute();
     
        // return values from database
        return $stmt;
    }

    public function searchList($name, $surname, $mobile, $address){
 
    // select all query
    $query = "SELECT
                p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, p.`admin_comments`, co.`address`, co.`mobile`, co.`phone`
            FROM
                " . $this->table_name . " p
                LEFT JOIN ". $this->contact_table_name." co
                    ON p.id = co.professional_id
            WHERE
                p.first_name LIKE ? AND p.last_name LIKE ? AND co.mobile LIKE ? AND co.address LIKE ?
            ORDER BY
                    p.`id` DESC
                LIMIT 0, 30";

                //echo $query;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $name=htmlspecialchars(strip_tags($name));
    $name = "%{$name}%";
    $surname=htmlspecialchars(strip_tags($surname));
    $surname = "%{$surname}%";
    $mobile=htmlspecialchars(strip_tags($mobile));
    $mobile = "%{$mobile}%";
    $address=htmlspecialchars(strip_tags($address));
    $address = "%{$address}%";
 
    // bind
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $surname);
    $stmt->bindParam(3, $mobile);
    $stmt->bindParam(4, $address);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
    }

    // used for paging 
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function readOne(){
     
        // query to read single record
        $query = "SELECT
                 p.`id`, p.`first_name`, p.`last_name`, p.`sex`, p.`profile_status`, p.`admin_comments`,p.`viewtype`,p.`verified`, cd.`image1`, cd.`image2`, cd.`image3`, cd.`perid1`, cd.`perid2`, cd.`agreement1`, cd.`agreement2`, cd.`agreement3`, cd.`agreement4`, cd.`agreement5`, cd.`approve_per`, cd.`approve_doc`, co.`address`, co.`mobile`, co.`phone`, ca.`email`, ca.`calendar_id`, ct.`county_id`
            FROM
                " . $this->table_name . " p
                LEFT JOIN ". $this->contact_table_name." co
                    ON p.id = co.professional_id
                LEFT JOIN ". $this->account_table_name." ca
                    ON p.id = ca.professional_id
                LEFT JOIN ". $this->document_table_name." cd
                    ON p.id = cd.professional_id
                LEFT JOIN ". $this->counties_table_name." ct
                    ON p.id = ct.professional_id
                WHERE
                    p.id = :id
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
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->address = $row['address'];
        $this->sex = $row['sex'];
        $this->profile_status = $row['profile_status'];
        $this->admin_comments = $row['admin_comments'];
        $this->viewtype = $row['viewtype'];
        $this->verified = $row['verified'];
        $this->mobile = $row['mobile'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->calendar_id = $row['calendar_id'];
        $this->county_id = $row['county_id'];

        $this->image1 = $row['image1'];
        $this->image2 = $row['image2'];
        $this->image3 = $row['image3'];
        $this->perid1 = $row['perid1'];
        $this->perid2 = $row['perid2'];

        $this->agreement1 = $row['agreement1'];
        $this->agreement2 = $row['agreement2'];
        $this->agreement3 = $row['agreement3'];
        $this->agreement4 = $row['agreement4'];
        $this->agreement5 = $row['agreement5'];

        $this->approve_per = $row['approve_per'];
        $this->approve_doc = $row['approve_doc'];
    } // Read One



    function update($id, $first_name, $last_name, $address, $sex, $profile_status, $admin_comments, $mobile, $phone, $email, $calendar_id, $profile_image1, $profile_image2, $profile_image3, $profile_perid1, $profile_perid2, $profile_agreement1, $profile_agreement2, $profile_agreement3, $profile_agreement4, $profile_agreement5, $approve_per, $approve_doc, $viewtype, $verified ){
        
        
        $query = "UPDATE " . $this->table_name . "
                    SET
                    `first_name`=:first_name, `last_name`=:last_name, `sex`=:sex, `profile_status`=:profile_status, `admin_comments`=:admin_comments, `viewtype`=:viewtype, `verified`=:verified";
        $query .=" WHERE id = :id";

        $stmt = $this->conn->prepare( $query );

       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':first_name',  $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':sex',  $sex);
        $stmt->bindParam(':profile_status',  $profile_status);
        $stmt->bindParam(':admin_comments',  $admin_comments);
        $stmt->bindParam(':viewtype',  $viewtype);
        $stmt->bindParam(':verified',  $verified);
        
        if ($stmt->execute()) { 
           $this->update_contact($id, $address, $mobile, $phone); 
           $this->update_account($id, $email, $calendar_id ); 
           $this->update_document($id, $profile_image1, $profile_image2, $profile_image3, $profile_perid1, $profile_perid2, $profile_agreement1, $profile_agreement2, $profile_agreement3, $profile_agreement4, $profile_agreement5, $approve_per, $approve_doc ); 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional

    function update_contact($id, $address, $mobile, $phone ){
        
        
        $query = "UPDATE " . $this->contact_table_name . "
                    SET
                    `mobile`=:mobile, `phone`=:phone, `address`=:address";
        
        $query .=" WHERE professional_id = :id";

        $stmt = $this->conn->prepare( $query );

       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':mobile',  $mobile);
        $stmt->bindParam(':phone',  $phone);
        $stmt->bindParam(':address',  $address);
        
        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional Contact

    function update_account($id, $email, $calendar_id ){
        
        
        $query = "UPDATE " . $this->account_table_name . "
                    SET
                    `email`=:email, `calendar_id`=:calendar_id";
        
        $query .=" WHERE professional_id = :id";

        $stmt = $this->conn->prepare( $query );

       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':email',  $email);
        $stmt->bindParam(':calendar_id',  $calendar_id);
        
        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional Account

    function update_document($id, $profile_image1, $profile_image2, $profile_image3, $profile_perid1, $profile_perid2, $profile_agreement1, $profile_agreement2, $profile_agreement3, $profile_agreement4, $profile_agreement5, $approve_per, $approve_doc  ){
        
        // Check Professional document
        $query = "SELECT count(id) as count  FROM " . $this->document_table_name . " 
                WHERE
                    professional_id = :id";
     
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        //echo $this->id." ------ ";

        $cur_id = $id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(@$row['count']){ // Update Documents
            $query = "UPDATE " . $this->document_table_name . "
                    SET
                    `approve_per`=:approve_per, `approve_doc`=:approve_doc";

            if(@$profile_image1){
                $query .= ", `image1`= '".$profile_image1."'";
            }
            if(@$profile_image2){
                $query .= ", `image2`= '".$profile_image2."'";
            }
            if(@$profile_image3){
                $query .= ", `image3`= '".$profile_image3."'";
            }

            if(@$profile_perid1){
                $query .= ", `perid1`= '".$profile_perid1."'";
            }
            if(@$profile_perid2){
                $query .= ", `perid2`= '".$profile_perid2."'";
            }

            if(@$profile_agreement1){
                $query .= ", `agreement1`= '".$profile_agreement1."'";
            }
            if(@$profile_agreement2){
                $query .= ", `agreement2`= '".$profile_agreement2."'";
            }
            if(@$profile_agreement3){
                $query .= ", `agreement3`= '".$profile_agreement3."'";
            }
            if(@$profile_agreement4){
                $query .= ", `agreement4`= '".$profile_agreement4."'";
            }
            if(@$profile_agreement5){
                $query .= ", `agreement5`= '".$profile_agreement5."'";
                    }
                    
            $query .=" WHERE professional_id = :id";
            
            $stmt = $this->conn->prepare( $query );
            // bind id of product to be updated
            $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        }else{ // Insert New Record

            $query = "INSERT INTO " . $this->document_table_name . " (`professional_id`, `image1`, `image2`, `image3`, `perid1`, `perid2`, `agreement1`, `agreement2`, `agreement3`, `agreement4`, `agreement5`, `approve_per`, `approve_doc`) VALUES ($id, '".$profile_image1."', '".$profile_image2."', '".$profile_image3."', '".$profile_perid1."', '".$profile_perid2."', '".$profile_agreement1."', '".$profile_agreement2."', '".$profile_agreement3."', '".$profile_agreement4."', '".$profile_agreement5."', :approve_per, :approve_doc)";

            $stmt = $this->conn->prepare( $query );
        }
        
        $stmt->bindParam(':approve_per',  $approve_per, PDO::PARAM_INT);
        $stmt->bindParam(':approve_doc',  $approve_doc, PDO::PARAM_INT);
        
        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional Document



    public function statistics(){
     
        // query to read single record
        $query = "SELECT `status`, COUNT(*) AS count FROM appointments WHERE prof_member_id = :id  GROUP BY `status`";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;

        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        return $stmt;
        
    } 

    public function cancelStatus(){
     
        // query to read single record
        $query = "SELECT `cancelReason`, COUNT(*) AS count FROM appointments WHERE prof_member_id = :id and status=0  GROUP BY `cancelReason`";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        $cur_id = $this->id;

        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        return $stmt;
        
    }

    
    function updateInvoiceSettings($professional_id, $company_name, $profession, $address, $tax_id, $tax_office){


        $query = "INSERT INTO ". $this->invoicesettings_table_name ." (`professional_id`, `company_name`, `profession`, `address`, `tax_id`, `tax_office`) VALUES (:professional_id, :company_name, :profession, :address, :tax_id, :tax_office) ON DUPLICATE KEY UPDATE `company_name`=:company_name, `profession`=:profession, `address`=:address, `tax_id`=:tax_id, `tax_office`=:tax_office";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        $stmt->bindParam(':professional_id',  $professional_id);
        $stmt->bindParam(':company_name',  $company_name);
        $stmt->bindParam(':profession',  $profession);
        $stmt->bindParam(':address',  $address);
        $stmt->bindParam(':tax_id',  $tax_id);
        $stmt->bindParam(':tax_office',  $tax_office);
        
        if ($stmt->execute()) {
           
           return 1;
        } else {
           return 0;
        }
    } // Save Customer

}
?>