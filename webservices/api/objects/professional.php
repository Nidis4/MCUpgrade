<?php
class Professional{
 
    // database connection and table name
    private $conn;
    private $table_name = "professionals";
    private $contact_table_name = "professionals_contact_details";
    private $account_table_name = "professionals_account_info";
    private $document_table_name = "professionals_documents";
    private $counties_table_name = "professionals_counties";
    private $categories_table_name = "professionals_categories";
    private $applications_table_name = "professionals_applications";
    private $invoicesettings_table_name = "professionals_invoice_settings";
    private $photos_table_name = "professionals_photos";
 
    // object properties
    public $professional_id;
    public $address;
    public $area;
    public $city;
    public $service_area;
    public $country_id;
    public $latitude;
    public $longtitude;
    public $mobile;
    public $phone;
    public $postcode;
    public $county_id;
    public $calendar_id;
    public $username;
    public $password;
    public $email;
 
    public function __construct($db){
        $this->conn = $db;
    }

    function loginUser($id){
        $query = "UPDATE ". $this->account_table_name." SET `last_login`=now(), `last_login_ip`= '".$_SERVER['REMOTE_ADDR']."' WHERE `professional_id`='".$id."'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }
    function login(){
     
        // select all query
        $query = "SELECT  a.professional_id as id, a.email, a.password,a.last_login,  a.status, p.first_name, p.last_name
                FROM `" . $this->account_table_name . "` a 
                LEFT JOIN ". $this->table_name." p
                    ON p.id = a.professional_id
                WHERE a.email = :username AND a.password = :password
                ORDER BY a.professional_id ASC";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        $username = $this->username;
        $password = $this->password;
        $password = md5($password);

        // bind id of product to be updated
        $stmt->bindParam(':username',  $username, PDO::PARAM_STR);
        $stmt->bindParam(':password',  $password, PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }

    public function forgetPassword(){
        // select all query
        $query = "SELECT  professional_id 
                FROM `" . $this->account_table_name . "` a 
                WHERE a.email = :email";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        $email = $this->email;

        // bind id of product to be updated
        $stmt->bindParam(':email',  $email, PDO::PARAM_STR);        
        // execute query
        $stmt->execute();

        $num = $stmt->rowCount();
        if( $num >= 1){
            $key = base64_encode($email.time()); 
            $time = strtotime("+5 minutes");

            $query1 = "UPDATE " . $this->account_table_name . "
                    SET `resetkey`='".$key."', `resettime`='".$time."'";
            $query1 .=" WHERE `email` = '".$email."'";
            
            $stmt1 = $this->conn->prepare( $query1 );
            $stmt1->execute();
            
            $return = array('email'=>$email,'key'=>$key);


            return $return;

        }else{
            return 0;
        }
     
        
    }

    public function resetPassword($password,$resetkey){
        // select all query
        $query = "SELECT  professional_id 
                FROM `" . $this->account_table_name . "` a 
                WHERE a.`resetkey` = :resetkey and `resettime` >='".time()."'";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(':resetkey',  $resetkey, PDO::PARAM_STR);        
        // execute query
        $stmt->execute();

        $num = $stmt->rowCount();
        if( $num >= 1){
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $pass = md5($password);

            $query1 = "UPDATE " . $this->account_table_name . "
                    SET `password`='".$pass."', `resetkey`=''";
            $query1 .=" WHERE professional_id = '".$row['professional_id']."'";
        
            $stmt1 = $this->conn->prepare( $query1 );
            $stmt1->execute();
            
            $return = array('professional_id'=>$row['professional_id']);

            return $return;

        }else{
            return 0;
        }   
    }

    public function read_professional_meta($professional_permalink){

        $query = "SELECT * FROM professionals_meta WHERE permalink ='".$professional_permalink."'";
               
        $stmt = $this->conn->prepare( $query );
        //echo $this->id." ------ ";
        // execute query
        $stmt->execute();
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->professional_id = $row['professional_id'];
        $this->meta_title = $row['meta_title'];
        $this->meta_description = $row['meta_description'];
        $this->meta_robots = $row['meta_robots'];
        $this->permalink = $row['permalink'];

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
        $query = "SELECT p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, co.`address` FROM `professionals` p, `professionals_counties` c, `professionals_applications` a, `professionals_contact_details` co WHERE c.professional_id=p.id AND p.`verified` = 1 AND a.professional_id=p.id AND co.professional_id=p.id  AND c.county_id= :county AND a.application_id=:application AND a.`price` >= '1'";

        $stmt = $this->conn->prepare( $query );

        $county_id = $this->county_id;
        $application_id = $this->application_id;
        $stmt->bindParam(':county',  $county_id, PDO::PARAM_INT);
        $stmt->bindParam(':application',  $application_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }

    public function restAvailable($date, $time, $address){
        $query = "SELECT p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, co.`address` 
                FROM `professionals` p, `professionals_counties` c, `professionals_applications` a, `professionals_contact_details` co 
                WHERE p.`verified`=1 AND c.professional_id=p.id AND a.professional_id=p.id AND co.professional_id=p.id  AND c.county_id= :county AND a.application_id= :application AND p.`id` NOT IN (SELECT `prof_member_id` FROM `appointments` WHERE `date` = '$date' AND `time` = '$time' AND `address`= '$address' )";

        $stmt = $this->conn->prepare( $query );

        $county_id = $this->county_id;
        $application_id = $this->application_id;
        $stmt->bindParam(':county',  $county_id, PDO::PARAM_INT);
        $stmt->bindParam(':application',  $application_id, PDO::PARAM_INT);

        $stmt->execute();
 
        return $stmt;
    }

    public function addBusy($id, $bdate, $btime){
        $query = "INSERT INTO `professionals_busytimes` (`ID`, `PROFESSIONAL_ID`, `DATE`, `TIME`) VALUES (NULL, '".$id."', '".$bdate."', '".$btime."');";
        //echo $query;
        $stmt = $this->conn->prepare( $query );
        //$stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function deleteBusy($id, $prof_id, $busy_date, $busy_time){
        if ($id!=""){
            $query = "DELETE FROM `professionals_busytimes` WHERE `ID` = $id";
        }
        else{
            $query = "DELETE FROM `professionals_busytimes` WHERE `PROFESSIONAL_ID` = $prof_id AND `DATE`='$busy_date' AND `TIME`='$busy_time' ";
        }
        
        //echo $query;
        $stmt = $this->conn->prepare( $query );
        //$stmt->bindParam(':id',  $id, PDO::PARAM_INT);
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

 
 $query ="SELECT `type`,
       `date`,
       `time`,
       `address`,
       `id`
FROM
  ( SELECT 'Appointment' AS TYPE,
           `date`,
           `time`,
           `address`,
           `id`
   FROM `appointments`
   WHERE `prof_member_id`=".$id."
     AND `status`NOT IN (0)
     AND `date` BETWEEN '".$startDate."' AND '".$endDate."'
     UNION   ALL
     SELECT 'Busy' AS TYPE,
            `DATE` AS date,
            `TIME` AS TIME,
            'Busy' AS address,
            `ID`
     FROM `professionals_busytimes` WHERE `PROFESSIONAL_ID` = ".$id."
     AND `DATE` BETWEEN '".$startDate."' AND '".$endDate."' ) subquery
ORDER BY `date` ASC,
         `time` ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

     public function readPaging($from_record_num, $records_per_page, $verified){
     
        // select query
        $query = "SELECT
                p.`id`, p.`first_name`, p.`last_name`, p.`profile_status`, p.`admin_comments`, co.`address`, co.`mobile`, co.`phone`, m.`meta_title`, m.`meta_description`, m.`meta_robots`, m.`permalink`
                FROM `professionals` p  
                LEFT JOIN `professionals_contact_details` co ON co.professional_id=p.id
                LEFT JOIN `professionals_meta` m ON m.professional_id=p.id
                WHERE p.`verified`='".$verified."'  
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
        $query = "SELECT a.id, c.name_greek, po.category_id, a.title_greek, po.price, a.unit, po.description, a.detail_description_gr, po.budget 
                    FROM `professionals_applications` po, `categories` c, `applications` a 
                    WHERE `professional_id`= ? AND po.category_id=c.id AND po.application_id = a.id AND po.price >0  
                    ORDER BY po.price";
     
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

    public function getScore($cat_id){
        $query = "SELECT s.`prof_id`, p.`first_name`, p.`last_name`, s.`total` FROM `professionals_scoring` s LEFT JOIN `professionals` p ON s.PROF_ID = p.ID WHERE `CATEGORY_ID` = $cat_id ORDER BY `TOTAL` DESC";
        $stmt = $this->conn->prepare( $query );

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
                 p.`id`, p.`first_name`, p.`last_name`, p.`sex`, p.`description`, p.`image`, p.`profile_status`, p.`admin_comments`,p.`viewtype`,p.`verified`,p.`defaultsms`, p.`service_area`, cd.`image1`, cd.`image2`, cd.`image3`, cd.`perid1`, cd.`perid2`, cd.`agreement1`, cd.`agreement2`, cd.`agreement3`, cd.`agreement4`, cd.`agreement5`, cd.`approve_per`, cd.`approve_doc`, co.`address`, co.`city`, co.`mobile`, co.`mobile2`, co.`phone`, ca.`email`, ca.`calendar_id`, ct.`county_id`
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
        $this->city = $row['city'];
        $this->service_area = $row['service_area'];
        $this->sex = $row['sex'];
        $this->image = $row['image'];
        $this->description = $row['description'];
        $this->profile_status = $row['profile_status'];
        $this->admin_comments = $row['admin_comments'];
        $this->viewtype = $row['viewtype'];
        $this->verified = $row['verified'];
        $this->defaultsms = $row['defaultsms'];
        $this->mobile = $row['mobile'];
        $this->mobile2 = $row['mobile2'];
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



    function update($id, $first_name, $last_name, $address, $sex, $profile_status, $admin_comments, $mobile, $phone, $email, $calendar_id, $profile_image1, $profile_image2, $profile_image3, $profile_perid1, $profile_perid2, $profile_agreement1, $profile_agreement2, $profile_agreement3, $profile_agreement4, $profile_agreement5, $approve_per, $approve_doc, $viewtype, $verified, $defaultsms,$mobile2  ){
        
        
        $query = "UPDATE " . $this->table_name . "
                    SET
                    `first_name`=:first_name, `last_name`=:last_name, `sex`=:sex, `profile_status`=:profile_status, `admin_comments`=:admin_comments, `viewtype`=:viewtype, `verified`=:verified, `defaultsms`=:defaultsms";
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
        $stmt->bindParam(':defaultsms',  $defaultsms);
        
        if ($stmt->execute()) { 
           $this->update_contact($id, $address, $mobile, $phone, $mobile2,''); 
           $this->update_account($id, $email, $calendar_id ); 
           $this->update_document($id, $profile_image1, $profile_image2, $profile_image3, $profile_perid1, $profile_perid2, $profile_agreement1, $profile_agreement2, $profile_agreement3, $profile_agreement4, $profile_agreement5, $approve_per, $approve_doc ); 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional

    function update_contact($id, $address, $mobile, $phone, $mobile2,$city = NULL ){
        
        
        //$query = "UPDATE " . $this->contact_table_name . "
                    // SET
                    // `mobile`=:mobile, `phone`=:phone, `address`=:address";

        $query = "INSERT INTO ". $this->contact_table_name ." (`professional_id`, `mobile`, `phone`, `address`, `mobile2`,`city`) VALUES (:id, :mobile, :phone, :address, :mobile2, :city) ON DUPLICATE KEY UPDATE `mobile`=:mobile, `phone`=:phone, `address`=:address, `mobile2`= :mobile2, `city`= :city";
        
        //$query .=" WHERE professional_id = :id";

        $stmt = $this->conn->prepare( $query );

       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        $stmt->bindParam(':mobile',  $mobile);
        $stmt->bindParam(':phone',  $phone);
        $stmt->bindParam(':address',  $address);
        $stmt->bindParam(':mobile2',  $mobile2);
        $stmt->bindParam(':city',  $city);
        
        if ($stmt->execute()) { 
           return 1;
        } else {
           return 0;
        }
    } // Save Professional Contact

    function update_account($id, $email, $calendar_id ){
        
        
        // $query = "UPDATE " . $this->account_table_name . "
        //             SET
        //             `email`=:email, `calendar_id`=:calendar_id";
        
        // $query .=" WHERE professional_id = :id";


         $query = "INSERT INTO ". $this->account_table_name ." (`professional_id`, `email`, `calendar_id`,`password`,`created`,`modified`,`status`) VALUES (:id, :email, :calendar_id,'','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','2') ON DUPLICATE KEY UPDATE `email`=:email, `calendar_id`=:calendar_id, `modified`='".date('Y-m-d H:i:s')."'";

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

    
    function updateInvoiceSettings($professional_id, $company_name, $profession, $address, $tax_id, $tax_office, $business_type, $vat_number,$country, $pc, $land_line, $mobile_phone, $receipt_email, $id_card_number, $personal_vat_id, $website, $directory_link, $viewtype){


        $query = "INSERT INTO ". $this->invoicesettings_table_name ." (`professional_id`, `company_name`, `profession`, `address`, `tax_id`, `tax_office`, `business_type`, `vat_number`, `country`, `pc`, `land_line`, `mobile_phone`, `receipt_email`, `id_card_number`, `personal_vat_id`, `website`, `directory_link`) VALUES (:professional_id, :company_name, :profession, :address, :tax_id, :tax_office, :business_type, :vat_number, :country, :pc, :land_line, :mobile_phone, :receipt_email, :id_card_number, :personal_vat_id, :website, :directory_link) ON DUPLICATE KEY UPDATE `company_name`=:company_name, `profession`=:profession, `address`=:address, `tax_id`=:tax_id, `tax_office`=:tax_office, `business_type`=:business_type, `vat_number`=:vat_number, `country`=:country, `pc`=:pc, `land_line`=:land_line, `mobile_phone`=:mobile_phone, `receipt_email`=:receipt_email, `id_card_number`=:id_card_number, `personal_vat_id`=:personal_vat_id, `website`=:website, `directory_link`=:directory_link";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        $stmt->bindParam(':professional_id', $professional_id, PDO::PARAM_INT);
        $stmt->bindParam(':company_name',  $company_name);
        $stmt->bindParam(':profession',  $profession);
        $stmt->bindParam(':address',  $address);
        $stmt->bindParam(':tax_id',  $tax_id);
        $stmt->bindParam(':tax_office',  $tax_office);
        $stmt->bindParam(':business_type',  $business_type);
        $stmt->bindParam(':vat_number',  $vat_number);
        $stmt->bindParam(':country',  $country);
        $stmt->bindParam(':pc',  $pc);
        $stmt->bindParam(':land_line',  $land_line);
        $stmt->bindParam(':mobile_phone',  $mobile_phone);
        $stmt->bindParam(':receipt_email',  $receipt_email);
        $stmt->bindParam(':id_card_number',  $id_card_number);
        $stmt->bindParam(':personal_vat_id',  $personal_vat_id);
        $stmt->bindParam(':website',  $website);
        $stmt->bindParam(':directory_link',  $directory_link);
        //$stmt->execute();
        //$stmt->debugDumpParams();
        //die($professional_id);
        
        if ($stmt->execute()) {
            $query1 = "UPDATE " . $this->table_name . "
                    SET `viewtype`=:viewtype ";

            $query1 .=" WHERE id = :id";

            $stmt1 = $this->conn->prepare( $query1 ); 

            $stmt1->bindParam(':id', $professional_id, PDO::PARAM_INT);
            $stmt1->bindParam(':viewtype',  $viewtype);
            $stmt1->execute();
           //die('sdf');
           return 1;
           
        } else {
           //die('0');
           return 0;

        }
    } // Save Customer

    function update_categories($id, $categories ){

        $cids = explode(',',$categories);

        // select query for main category
        $query = "SELECT category_id FROM ". $this->categories_table_name ." WHERE `professional_id`= ? and is_main='1'";     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );     
        // bind variable values
        $stmt->bindParam(1, $id, PDO::PARAM_INT);        
        // execute query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num >= 1){
            $rowCat = $stmt->fetch(PDO::FETCH_ASSOC);
            $main_cid = $rowCat['category_id'];
        }else{
            $main_cid = 0;
        }

        // Delete query
        $query = "Delete FROM ". $this->categories_table_name ." WHERE `professional_id`= ?";     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );     
        // bind variable values
        $stmt->bindParam(1, $id, PDO::PARAM_INT);        
        // execute query
        $stmt->execute();

        if(@$cids){
            $iquery = "";
            foreach ($cids as  $cvalue) {

               if($cvalue == $main_cid){
                    $is_main = 1;
               }else{
                    $is_main = 0;
               }
               $query = "INSERT INTO ". $this->categories_table_name ." (`professional_id`, `category_id`,`is_main`) VALUES (:id, '".$cvalue."',$is_main)";
               $stmt = $this->conn->prepare( $query );
               $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
               $stmt->execute();

            }
        }

        return 1;

    } // Save Professional Categories

     function update_counties($id, $categories ){

        $cids = explode(',',$categories);

        // select query for main category
        $query = "SELECT county_id FROM ". $this->counties_table_name ." WHERE `professional_id`= ? and is_main='1'";     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );     
        // bind variable values
        $stmt->bindParam(1, $id, PDO::PARAM_INT);        
        // execute query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num >= 1){
            $rowCat = $stmt->fetch(PDO::FETCH_ASSOC);
            $main_cid = $rowCat['county_id'];
        }else{
            $main_cid = 0;
        }

        // Delete query
        $query = "Delete FROM ". $this->counties_table_name ." WHERE `professional_id`= ?";     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );     
        // bind variable values
        $stmt->bindParam(1, $id, PDO::PARAM_INT);        
        // execute query
        $stmt->execute();

        if(@$cids){
            $iquery = "";
            foreach ($cids as  $cvalue) {

               if($cvalue == $main_cid){
                    $is_main = 1;
               }else{
                    $is_main = 0;
               }
               $query = "INSERT INTO ". $this->counties_table_name ." (`professional_id`, `county_id`,`is_main`) VALUES (:id, '".$cvalue."',$is_main)";
               $stmt = $this->conn->prepare( $query );
               $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
               $stmt->execute();

            }
        }

        return 1;

    } // Save Professional Counties


    public function getCategories(){
     
        // select query
        $query = "SELECT pc.`category_id`, pc.`is_main`, c.`title`, c.`title_greek`,pc.`truck_dimensions` FROM ". $this->categories_table_name ." pc 
                  Join categories c ON pc.category_id = c.id
                WHERE pc.`professional_id`= ? order by pc.is_main desc";
     
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

    public function getScoredCategories(){
     
        // select query
        $query = "SELECT pc.`category_id`,  c.`title`, c.`title_greek` FROM `professionals_scoring` pc 
                  Join categories c ON pc.category_id = c.id
                WHERE pc.`prof_id`= ? ";
     
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


    public function getApplicationsPrices(){
     
        // select query
        //$query = "SELECT c.name_greek, po.category_id, a.title_greek, po.price FROM `professionals_applications` po, `categories` c, `applications` a WHERE `professional_id`= ? AND po.category_id=c.id AND po.application_id = a.id";

        $categories = $this->getCategories();
        $num = $categories->rowCount();
        if($num >= 1){

            while ($rowCat = $categories->fetch(PDO::FETCH_ASSOC)){
                $cids[] = $rowCat['category_id'];                
            }
                
            $query = "Select a.id as application_id, a.category_id, c.name as category_name, a.title as application_title, a.title_greek as application_title_gr, a.short_description as application_short_description, a.detail_description as application_detail_description, a.unit as application_unit, pa.price as application_price, pa.free_distance as application_free_distance, pa.extra_price_km as application_extra_price_km, pa.description as application_description, pa.tec_description as application_tec_description, pa.budget as application_budget from applications a  
                LEFT JOIN professionals_applications pa ON a.id = pa.application_id and pa.professional_id= ? 
                        JOIN categories c ON a.category_id = c.id
                        WHERE a.category_id IN ('".implode("','", $cids)."')  ORDER BY a.category_id, a.sequence";

            $stmt = $this->conn->prepare( $query );

            $id = $this->id;
            $stmt->bindParam(1, $id, PDO::PARAM_INT);

            $stmt->execute();
        
            // return values from database
            return $stmt;
            
        }else{
            return 0;
        }
        
     
    }

    public function getAllReviews(){
        $query = "SELECT c.`first_name`, c.`last_name`, rat.`quality`, rat.`reliability`, rat.`cost`, rat.`schedule`, rat.`behaviour`, rat.`cleanliness`, rat.`comment`, rat.`created`
FROM `directory_ratings` rat
LEFT JOIN customers c ON c.id = rat.customer_id
WHERE rat.`professional_id`=  ?
ORDER BY rat.`created` DESC";

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

    public function getReviewStats(){
        $query = "SELECT COUNT(*) AS TOTAL,AVG(rat.quality + rat.reliability + rat.cost + rat.schedule + rat.cleanliness +rat.behaviour)/6  AS AVE_TOTAL, AVG(rat.quality) AS quality, AVG(rat.reliability) AS reliability, AVG(rat.cost) AS cost, AVG(rat.schedule) AS schedule, AVG(rat.behaviour) AS behaviour, AVG(rat.cleanliness) AS cleanliness
                FROM `directory_ratings` rat 
                WHERE rat.`professional_id`= ?
                ORDER BY rat.`created` DESC";

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


    public function getCounties(){
     
        // select query
        $query = "SELECT pc.`county_id`, pc.`is_main`, c.`county_name`, c.`county_name_gr` FROM ". $this->counties_table_name ." pc 
                  Join counties c ON pc.county_id = c.id
                WHERE pc.`professional_id`= ? order by pc.is_main desc";
     
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

    public function updateApplications($professional_id,$applications){
        
        if(@$applications){
            foreach ($applications as $value) {
                $price = (float)$value['price'];
                $free_distance = $value['free_distance'];
                $extra_price_km = $value['extra_price_km'];
                $description = $value['description'];
                $budget = $value['budget'];
                $application_id = $value['application_id'];
                $category_id = $value['category_id'];

                $query = "Select id from ".$this->applications_table_name." WHERE professional_id='".$professional_id."' and application_id='".$application_id."' and category_id='".$category_id."'";
                // prepare query statement
                $stmt = $this->conn->prepare( $query );
                // execute query
                $stmt->execute();
                $num = $stmt->rowCount();
                if($num >= 1){
                    // Update
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);   
                    $uquery = "Update ".$this->applications_table_name." set price='".$price."',  free_distance='".$free_distance."', extra_price_km='".$extra_price_km."', description='".$description."', budget='".$budget."',modified='".date('Y-m-d H:i:s')."' WHERE id='".$row['id']."'"; 
                    $ustmt = $this->conn->prepare( $uquery ); 
                    $ustmt->execute();
                    
                }else{
                    // Insert
                    $iquery = "INSERT INTO " . $this->applications_table_name . " (`professional_id`, `application_id`, `category_id`, `price`, `free_distance`, `extra_price_km`, `description`,  `budget`, `status`,`created`, `modified`) VALUES ($professional_id, '".$application_id."', '".$category_id."', '".$price."', '".$free_distance."', '".$extra_price_km."', '".$description."', '".$budget."', 'Active', '".date('Y-m-d')."', '".date('Y-m-d H:i:s')."')";

                    $istmt = $this->conn->prepare($iquery); 
                    $istmt->execute(); 

                }
                
            }

            return 1;
            
        }else{
            return 0;
        }
    }

    public function updateMainCategory($professional_id,$main_category){
        $query = "Update ".$this->categories_table_name." set is_main='0' where professional_id ='".$professional_id."'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $query = "Update ".$this->categories_table_name." set is_main='1' where professional_id ='".$professional_id."' and category_id='".$main_category."'";
        $stmt = $this->conn->prepare( $query );
        // execute query
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }

    }

    public function updateMainCounty($professional_id,$county_id){
        $query = "Update ".$this->counties_table_name." set is_main='0' where professional_id ='".$professional_id."'";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $query = "Update ".$this->counties_table_name." set is_main='1' where professional_id ='".$professional_id."' and county_id='".$county_id."'";
        $stmt = $this->conn->prepare( $query );
        // execute query
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }

    }

    public function getProfile(){
        $query = "Select p.id, p.first_name, p.last_name, p.description, p.service_area, p.image, p.verified, pc.address, pc.city, pc.mobile  from ".$this->table_name." p 
                  LEFT JOIN ".$this->contact_table_name." pc on p.id = pc.professional_id 
                  where p.id = :id";

        $stmt = $this->conn->prepare( $query );
        $id = $this->id;
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        
        $stmt->execute();

        // return values from database
        return $stmt;

    }

    public function uploadPhotos($prof_id,$images){

        if(@$images){
            $uploadimages = array();
            foreach ($images as $key => $value) {
                # code...
                if(is_uploaded_file($images[$key]['tmp_name'])) {
                    $sourcePath = $images[$key]['tmp_name'];
                    $filename = time().str_replace(" ", '_', $images[$key]['name']);
                    $uploadimages[] = $filename;
                    $targetPath = "../../../img/professional-imgs/portfolio/".$filename;
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                        //$img .= "<a href='".$targetPath."' data-toggle='lightbox' data-gallery='example-gallery' class='col-sm-3'><img src='".$targetPath."' class='img-fluid' /></a>"; 
                        $query = "INSERT INTO " . $this->photos_table_name . " (`professional_id`, `image_name`) VALUES ($prof_id, '".$filename."')";

                        $stmt = $this->conn->prepare( $query );
                        $stmt->execute();

                    }
                }
            }

            return $uploadimages;

        }else{

            return 0;

        }

    }

    public function getPhotos(){
        // select query
        $query = "SELECT pc.`id`, pc.`image_name` FROM ". $this->photos_table_name ." pc                   
                WHERE pc.`professional_id`= ? order by pc.image_order";
     
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

    public function updateProfile($prof_id, $first_name, $last_name, $service_area, $description, $address, $mobile, $profile_img, $city = NULL){


        $query = "UPDATE " . $this->table_name . "
                    SET `first_name`=:first_name, `last_name`=:last_name, `description`=:description, `service_area`=:service_area ";

        
        if(@$profile_img){
            $query .= " ,`image`='".$profile_img."'";
        }  

        $query .=" WHERE id = :id";

        $stmt = $this->conn->prepare( $query );
       
        // bind id of product to be updated
        $stmt->bindParam(':id',  $prof_id, PDO::PARAM_INT);
        $stmt->bindParam(':first_name',  $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':description',  $description);
        $stmt->bindParam(':service_area',  $service_area);
        
        if ($stmt->execute()) { 
           
           $this->update_contact($prof_id, $address, $mobile, "", "",$city); 
           return 1;
        } else {
           return 0;
        }    
    }


    public function getIncoiceSettings(){
        $query = "Select pi.*,p.viewtype, pd.perid1 as company_stamp, pd.perid2 as id_card from ".$this->invoicesettings_table_name." pi 
                  JOIN ".$this->table_name." p on pi.professional_id = p.id 
                  LEFT JOIN ".$this->document_table_name." pd ON p.id = pd.professional_id
                  where pi.professional_id = :id";

        $stmt = $this->conn->prepare( $query );
        $id = $this->id;
        $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
        
        $stmt->execute();

        // return values from database
        return $stmt;

    }

    public function updateCompanyStamp($prof_id,$company_stamp){
        // Check Professional document
        $query = "SELECT count(id) as count  FROM " . $this->document_table_name . " 
                WHERE
                    professional_id = :id";
     
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        //echo $this->id." ------ ";

        $cur_id = $prof_id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(@$row['count']){ // Update Documents
            $query = "UPDATE " . $this->document_table_name . "
                    SET perid1='".$company_stamp."'";
            $query .=" WHERE professional_id = :id";
            
            $stmt = $this->conn->prepare( $query );
            // bind id of product to be updated
            $stmt->bindParam(':id',  $prof_id, PDO::PARAM_INT);
        }else{ // Insert New Record

            $query = "INSERT INTO " . $this->document_table_name . " (`professional_id`, `perid1`) VALUES ($id, '".$company_stamp."')";

            $stmt = $this->conn->prepare( $query );
        } 

        $stmt->execute();

        return 1;
    }


    public function updateIdCard($prof_id,$id_card){
        // Check Professional document
        $query = "SELECT count(id) as count  FROM " . $this->document_table_name . " 
                WHERE
                    professional_id = :id";
     
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        //echo $this->id." ------ ";

        $cur_id = $prof_id;
        // bind id of product to be updated
        $stmt->bindParam(':id',  $cur_id, PDO::PARAM_INT);
        //$stmt->bindValue(':id', '$cur_id', PDO::PARAM_STR);
     
        // execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(@$row['count']){ // Update Documents
            $query = "UPDATE " . $this->document_table_name . "
                    SET perid2='".$id_card."'";
            $query .=" WHERE professional_id = :id";
            
            $stmt = $this->conn->prepare( $query );
            // bind id of product to be updated
            $stmt->bindParam(':id',  $prof_id, PDO::PARAM_INT);
        }else{ // Insert New Record

            $query = "INSERT INTO " . $this->document_table_name . " (`professional_id`, `perid2`) VALUES ($id, '".$id_card."')";

            $stmt = $this->conn->prepare( $query );
        } 

        $stmt->execute();

        return 1;
    }

    public function orderPhoto($id, $order){

           $query = "UPDATE " . $this->photos_table_name . "
                    SET image_order='".$order."'";
           $query .=" WHERE id = '".$id."'";
            
           $stmt = $this->conn->prepare( $query );
            // bind id of product to be updated
           if($stmt->execute()){
                return 1;
           }else{
                return 0;
           }
    }

    public function deletePhoto($id){

        $query = "DELETE from " . $this->photos_table_name;
        $query .=" WHERE id = '".$id."' and professional_id = :prof_id";
        
        $stmt = $this->conn->prepare( $query );
        
        // bind id of product to be updated
        $prof_id = $this->professional_id;
        $stmt->bindParam(':prof_id',  $prof_id, PDO::PARAM_INT);
        if($stmt->execute()){
            return 1;
       }else{
            return 0;
       }
}

    public function checkProf($email, $mobile){
        $message = "";
        $error = 0;
        $return = array('message' => $message,'error' => $error );

        // Check Email
        $query = "SELECT professional_id FROM " . $this->account_table_name . " 
                WHERE email = '".$email."'";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        // execute query
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num >= 1){
            $message = "Email already exist!";
            $error = 1;
            $return = array('message' => $message,'error' => $error );
            return $return; 
        }

        // Check mobile
        $query = "SELECT professional_id FROM " . $this->contact_table_name . " 
                WHERE mobile = '".$mobile."'";
        
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        // execute query
        $stmt->execute();

        $num = $stmt->rowCount();

        if($num >= 1){
            $message = "Mobile number already exist!";
            $error = 1;
            $return = array('message' => $message,'error' => $error );
            return $return; 
        }

        return $return;

    }

    public function signup($first_name, $last_name, $email, $mobile, $companyName, $select_idiotita, $select_job, $hear_us, $password){
        
        $query = "INSERT INTO ". $this->table_name ." (`first_name`, `last_name`,`current_working`) VALUES ('".$first_name."', '".$last_name."','individual')";        
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $professional_id = $this->conn->lastInsertId();

        $this->update_contact($professional_id, '', $mobile, '','','');

        $this->update_account($professional_id, $email, '');


        $query = "UPDATE ". $this->account_table_name ." set password ='".md5($password)."' where professional_id = '".$professional_id."'";        
        $stmt = $this->conn->prepare( $query );
        if($stmt->execute()){

            return $professional_id;
        }else{
            return 0;
        }


    }


    function update_truck_dimensions($professional_id, $width, $length, $height, $door){

        $data = array('width'=>$width, 'length'=>$length, 'height'=>$height, 'door'=>$door);

        $query = "UPDATE ". $this->categories_table_name." SET `truck_dimensions`= '".json_encode($data)."' WHERE `professional_id`='".$professional_id."' and `category_id`='103'";

        $stmt = $this->conn->prepare($query);
        //$stmt->execute();
        if( $stmt->execute()){
             return 1;
        }
        return 0;

    }

    public function addCategory($category_id){
        
        $id = $this->id;
        // select query
         $query = "INSERT INTO `professionals_categories` (`professional_id`, `category_id`) VALUES ('".$id."', '".$category_id."');";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        
        
        // execute query
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
        
        
    }

    public function deleteCategory($category_id){
        
        $id = $this->id;
        // select query
         $query = "Delete from `professionals_categories` where professional_id = '".$id."' and category_id = '".$category_id."'; Delete from professionals_applications where professional_id='".$id."' and category_id='".$category_id."';";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        
        
        // execute query
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
        
        
    }

    public function addCounty($county_id){
        
        $id = $this->id;
        // select query
         $query = "INSERT INTO `professionals_counties` (`professional_id`, `county_id`) VALUES ('".$id."', '".$county_id."');";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        
        
        // execute query
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
        
        
    }

    public function deleteCounty($county_id){
        
        $id = $this->id;
        // select query
        $query = "Delete from `professionals_counties` where professional_id = '".$id."' and county_id = '".$county_id."'";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind variable values
        
        
        // execute query
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
        
        
    }


    function updateMeta($id, $meta_title, $meta_description, $meta_robots, $permalink){
        $query = "INSERT INTO `professionals_meta`(`professional_id`, `meta_title`, `meta_description`, `meta_robots`, `permalink`) VALUES ('".$id."', '".$meta_title."', '".$meta_description."', '".$meta_robots."', '".$permalink."') ON DUPLICATE KEY UPDATE `meta_title`= '".$meta_title."' , `meta_description`= '".$meta_description."', `meta_robots`= '".$meta_robots."', `permalink`= '".$permalink."'  ";
        //echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();
        return $stmt;
    }  


}
?>
