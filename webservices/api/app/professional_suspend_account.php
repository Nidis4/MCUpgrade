<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once 'ProfessionalClass.php';

// instantiate database and product object

$database = new Database();
$db = $database->getConnection();

// initialize object
$GetProfessionalClass = new ProfessionalClass($db);

// get keywords
if(isset($_REQUEST['member_id']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";
    
        $stmt = $GetProfessionalClass->Getcommision($member_id);

    if($stmt !== 0){
        $Propayment = $GetProfessionalClass->GetPropayment($member_id);

        $total = number_format($Propayment['propayment'] - $stmt['commisiont']);

      if($total ==''){
            $total = 0;
        }

        $row_array['status'] = "1";
        $row_array['total'] = $total;


        if($total < 50){
            $DelProfessionalsPayment = $GetProfessionalClass->DelProfessionalsPaymentLastDates($member_id);
            
            $datefinals=$Propayment['datetime_added'];
          
        }
        else
        { 
            $GetProfessionalsPayment = $GetProfessionalClass->GetProfessionalsPaymentLastDates($member_id);
                
                if($GetProfessionalsPayment != ''){
          
                    $datefinals = $GetProfessionalsPayment['created_date'];
                }
            else
            {
          
                $datefinals = date('Y-m-d H:i:s');
                $InsProfessionals = $GetProfessionalClass->InsProfessionalsPaymentLastDates($member_id);
            }
        }


        $row_array['last_payment_date'] = $Propayment['datetime_added'];
        $row_array['suspend_account_dates'] = $datefinals;
        echo json_encode($row_array);
       
    }

   else{
        $row_array['status'] = "0";
        $row_array['msg'] = "appointments not found";
        echo json_encode($row_array);
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>