<?php 
    include('session.php');
    include('header.php'); 
    $currentPage = 'timeline';
    include('menu.php'); 
 ?>
        <div class="col-md-12 page-title" ><h2>Latest Appointments</h2></div>
        <section id="cd-timeline" class="cd-container">
                <?php
                    $latest = 1;
                    $appointments = file_get_contents(SITE_URL.'webservices/api/appointment/read_paging.php?prof_id='.$_SESSION['id'].'&latest='.$latest.'&from_record_num=0&records_per_page=5');
                    $appointmentsPag = json_decode($appointments, true);

                    if(@$appointmentsPag['records'][0]['id']){
                        foreach ($appointmentsPag['records'] as $appointment) {
                            $appointment_date = $appointment['date'];
                            $appointment_time = str_replace(" ", '', $appointment['time']);
                            if(@$appointment_time){
                                $atime = explode('-', $appointment_time);
                            }else{
                                $atime[0] = "";
                            }

                            $appointment_budget = $appointment['budget'];
                            $appointment_commision = $appointment['commision'];
                            $appointment_address = $appointment['address'];
                            $appointment_cust_member_name = $appointment['cust_member_name'];
                            $appointment_comment = $appointment['comment'];
                            $appointment_agent_name = $appointment['agent_name'];


                    ?>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img <?php if(date('d',strtotime($appointment_date)) == date('d')){ echo "cd-date-today"; } else{ echo "cd-date-next-days";} ?>">
                                    <div class="appointment-day"><?php echo date('d',strtotime($appointment_date));?></div>
                                    <div class="appointment-month"><?php echo date('M',strtotime($appointment_date));?></div>
                                    <div class="appointment-time"><?php echo $atime[0];?></div>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <div class="col-md-12"><h2 class="appointment-cat-title">Energy Certificate</h2></div>
                                        <div class="col-md-6">
                                            <p class="appointment-customer-name">Name: <span class="custormer-name"><?php echo $appointment_cust_member_name; ?></span></p>
                                            <p class="appointment-address">Address: <a class="customer-address" target="_blank" href="https://www.google.gr/maps/dir//<?php echo $appointment_address;?>"><?php echo $appointment_address;?></a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="appointement-budget">Budget: <span class="customer-budget"><?php echo $appointment_budget;?>€</span></p>
                                            <p class="appointement-commission">Commission: <span class="customer-commission"><?php echo $appointment_commision;?>€</span></p>
                                             <p class="appointement-agent-name">Agent Name: <span class="agent-name"><?php echo $appointment_agent_name;?></span></p>
                                            
                                        </div>
                                        <div class="read-more-btn">Read more</div>
                                        <div class="read-more-txt">
                                            <div class="col-md-6">
                                                <p class="appointement-delivery-adress">Delivery Address: <span class="customer-delivery-adress"></span></p>
                                                <p class="appointement-distance">Distance: <span class="customer-distance"></span></p>

                                            </div>
                                            <div class="col-md-6"> 
                                                <a href="tel:6942657824"><div class="call-btn"><i class="fa fa-phone"></i> 6942657824</div></a>
                                            </div>
                                            <div class="col-md-12">

                                                <p>Comments: <span class="appointment-comments"><?php echo $appointment_comment;?></span></p>
                                                
                                                 
                                            </div>
                                            <div class="col-md-12 read-less-btn">Read less</div>
                                        </div>
                                   
                                </div> <!-- cd-timeline-content -->
                        </div> <!-- cd-timeline-block -->    
                    <?php
                            # code...
                        }
                    }else{
                ?>
                        No Upcoming Appoinment.      
                <?php        
                    }

                ?>

              </section>

              <div class="container">
                 
                      <div style="background: #fff; padding: 50px;" class="col-md-12 proffessional-calendar">
                            <h1 style="text-align: center;">HERE IS THE CALENDAR</h1>
                      </div>
                  
              </div>
        </div>
    </div>
    </body>
    

</html>