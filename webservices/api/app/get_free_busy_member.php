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
$GetProfessionalClassassd = new ProfessionalClass($db);

// get keywords
if(isset($_REQUEST['member_id']))
{
    $member_id=isset($_REQUEST["member_id"]) ? $_REQUEST["member_id"] : "";
   
    if($member_id != ''){
   
        
        $stmt = $GetProfessionalClassassd->GetFreeBusyStatus($member_id);

   
      if($stmt['id']!==''){
       
            $appbud = $GetProfessionalClassassd->Getappointmentsbudget($member_id);
            $Getpaymentsbudget = $GetProfessionalClassassd->Getpaymentsbudget($member_id);

            $ResultPercentage =  number_format((($appbud['percentage']/$Getpaymentsbudget['percentage'])*100),2)."";
            if($ResultPercentage == "NAN" || $ResultPercentage == "nan" || $ResultPercentage == "0.00" || $ResultPercentage == "" || $ResultPercentage == NULL || $ResultPercentage == "INF" || $ResultPercentage == "inf"){
            $ResultPercentage='0';
        }

           $count = 0;
           $quality = 0;
           $reliability = 0;
           $cost = 0;
           $schedule = 0;
           $behaviour = 0;
           $cleanliness = 0;

            $appbud = $GetProfessionalClassassd->Getdirectory_ratings($member_id);

            if($appbud['id']!=='0'){

                foreach ($appbud as $scorerow) {
            
                    $count += 1;
                    $quality +=$scorerow["quality"];
                    $reliability +=$scorerow["reliability"];
                    $cost +=$scorerow["cost"];
                    $schedule +=$scorerow["schedule"];
                    $behaviour +=$scorerow["behaviour"];
                    $cleanliness +=$scorerow["cleanliness"];

                }
                $FinleScore = $quality + $reliability +$cost +$schedule +$behaviour +$cleanliness;
                $sub = $FinleScore / $count / 6;
                $totalscore = round($sub, 1);
            }
            else{
               
                $totalscore = 0;
            }


        $obj['id'] = $stmt['id'];
        $obj['member_id'] = $stmt['member_id'];
        //$obj['free_busy_status'] = $stmt['status'];
        $obj['free_busy_status'] = '1';
        $obj['percentage'] = $ResultPercentage;
        $obj['review'] = $totalscore;
        $row_array['status'] = "1";
        $row_array['data'] = $obj;
        echo json_encode($row_array);

        }

      else{


        $row_array['status'] = "0";
        $row_array['msg'] = "No mumber found";
            echo json_encode($row_array);
      }
     
    }
}
else{
    $row_array['status'] = "0";
    $row_array['msg'] = "Please enter parameter";
    echo json_encode($row_array);
}
?>