<?php 
    include('session.php');
    include('header.php');
    $currentPage = 'balance';
    include('menu.php');
?>
<style type="text/css">
    .table-striped>tbody>tr.status-0 {
    background-color: #f8d7da;
}
</style>
                    <div class="container">
                            <div class="row proffessional-photos-row">
                                <div class="title-app-tabs">
                                    <h3>Balance</h3>
                                </div>

                                <?php
                                    $payments = file_get_contents(SITE_URL.'webservices/api/payment/paymentByProf.php?prof_id='.$_SESSION['id']);
                                    $paymentsPag = json_decode($payments, true); // decode the JSON into an associative array

                                    // echo "<pre>";
                                    // print_r($paymentsPag);
                                    // die;


                                ?>
                                <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Date/Time</th>
                                            <th>Category</th>
                                            <th>Appointment Info</th>
                                            <th>Comments</th>
                                            <th>Budget</th>
                                            <th>Commision</th>
                                            <th>Payment</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(@$paymentsPag['message'] && ($paymentsPag['message'] == "No Payments found.")){
                                        ?>

                                                <tr> <td colspan="7">No data found.</td></tr>
                                        <?php
                                            } elseif(@$paymentsPag){
                                                    $ii = 1;
                                                    foreach ($paymentsPag as $payment) {


                                                        $submission_date = $payment['datetime_added'];
                                                        $category_id = $payment['category_id'];
                                                        $appointment_details = $payment['appointment_details'];
                                                        $paymentDone = $payment['payment'];
                                                        $agent_id = $payment['agent_id'];
                                                        $date = $payment['datetime_added'];
                                                        $budget = $payment['budget'];
                                                        $commission = $payment['commision'];
                                                        $comment = $payment['comment'];
                                                        
                                                        $balance = $payment['balance'];

                                                        if(isset($payment['appointment_status'])){
                                                            $status = $payment['appointment_status'];
                                                        }else if(isset($payment['payment_status'])){
                                                            $status = $payment['payment_status'];
                                                        }else{
                                                            $status = "";
                                                        }
                                                        
                                                        

                                                        echo '<tr data-item-id="'.$ii.'" class="status-'.$status.'">
                                                                  <td>'.$date.'</td>
                                                                  <td>'.$category_id.'</td>
                                                                  <td>'.$appointment_details.'</td>
                                                                  <td>'.$comment.'</td>
                                                                  <td>'.$budget.'</td>
                                                                  <td>'.$commission.'</td>
                                                                  <td>'.$paymentDone.'</td>
                                                                  <td>'.$balance.'</td></tr>';
                                                    }
                                                }
                                        ?>
                                    </tbody>
                                </table>
                                

                                
                            </div>

                            
                    </div>
            </div>
        </div>

        
    </body>
</html>
