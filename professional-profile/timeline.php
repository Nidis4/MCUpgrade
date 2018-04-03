<?php 
    include('session.php');
    include('header.php'); 
    $currentPage = 'timeline';
    include('menu.php'); 
 ?>
 <link href="css/custom.css" rel="stylesheet">
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
                            $appointment_mobile = $appointment['mobile'];
                            $appointment_category = $appointment['category_name'];
                            //$appointment_category = "";


                    ?>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img <?php if(date('d',strtotime($appointment_date)) == date('d')){ echo "cd-date-today"; } else{ echo "cd-date-next-days";} ?>">
                                    <div class="appointment-day"><?php echo date('d',strtotime($appointment_date));?></div>
                                    <div class="appointment-month"><?php echo date('M',strtotime($appointment_date));?></div>
                                    <div class="appointment-time"><?php echo $atime[0];?></div>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <div class="col-md-12"><h2 class="appointment-cat-title"><?php echo $appointment_category;?></h2></div>
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
                                                <a href="tel:<?php echo $appointment_mobile;?>"><div class="call-btn"><i class="fa fa-phone"></i> <?php echo $appointment_mobile;?></div></a>
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
                    <?php
                        $startDate = date("Y-m-d");
                        //$startDate = "2018-03-31";
                        $endDate = date("Y-m-d",strtotime($startDate ." +5 Days"));
                        
                        $calendar = file_get_contents(SITE_URL.'webservices/api/professional/getCalendar.php?prof_id='.$_SESSION['id'].'&startDate='.$startDate.'&endDate='.$endDate);
                        $calendar = json_decode($calendar, true);

                        // echo "<pre>";
                        // print_r($calendar);
                        // die;
                    ?>

                    <div class="row" id="available">
                        <div class="col-md-12 availProf" data-listing-distance="100000">
                            <div class="col-md-12 calendar calendar18273 ui-selectable" style="display: block;">
                                <div class="row">
                                    <?php 
                                        $dates = array();
                                        if(@$calendar['calendar']){
                                            $i = 1;
                                            foreach ($calendar['calendar'] as $value) {
                                                if($i == 1 ){
                                                    
                                                    $dates[] = $value['date'];
                                    ?>
                                                <div class="col-md-2">
                                                        <div class="row calDate text-center">
                                                            <div class="col-md-12"><?php echo $value['date'];?></div>
                                                        </div> 
                                                        <ul class="selectable" id="selectable-18273">   
                                    <?php

                                                }else if(!in_array($value['date'], $dates)){

                                                    $dates[] = $value['date'];
                                    ?>
                                                        </ul>
                                                    </div><!-- Close col-md-2--> 
                                                    <div class="col-md-2">
                                                        <div class="row calDate text-center">
                                                            <div class="col-md-12"><?php echo $value['date'];?></div>
                                                        </div>
                                                        <ul class="selectable" id="selectable-18273">
                                                    
                                    <?php
                                                
                                                }

                                    ?>
                                                        <li class="<?php if($value['type'] == 'Busy'){?>busy <?php }else{?> free <?php }?> slot ui-selectee" timefrom="<?php echo $value['timefrom'];?>" timeto="<?php echo $value['timeto'];?>" data-dateslot="<?php echo $value['date'];?>">
                                                            
                                                            <?php echo $value['timefrom'];?>
                                                                
                                                        </li>
                                    <?php            

                                                if($i == count($calendar['calendar'])){
                                    ?>
                                                  </ul>
                                                </div><!-- Close col-md-2-->  
                                    <?php                
                                                }
                                    ?>
                                                
                                    <?php 
                                            $i++;
                                            } 
                                        }?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><br>
                            <div class="save-btn" id="savetime" >Save</div>
                        </div>
                    </div>
                  </div>
                  
              </div>
        </div>
    </div>
    <script src="../js/core.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $( ".calendar" ).selectable({
                  filter: ".slot.free",
                  stop: function() {
                    // var result = $( "#chosen-slot span" ).empty();
                    // var timeFrom = "";
                    // var timeTo = "";
                    // var dateChoosed ="";
                    // var profID = "";
                    // $( ".ui-selected", this ).each(function() {
                    //     //alert($( this ).attr('timefrom'));
                    //     if (timeFrom==""){
                    //         timeFrom = $( this ).attr('timefrom');
                    //     }
                    //     timeTo = $( this ).attr('timeto');
                    //     dateChoosed = $( this ).attr('data-dateslot');
                    //     profID = $(this).closest('.col-md-2').attr('id');
                    //   //result.append( " #" + ( index + 1 ) );
                    // });
                    // //result.append(dateChoosed+": "+timeFrom+"-"+timeTo);
                    // if (startDate == endDate){
                    //     //alert('Do Something: ' +profID);
                    //     $('.profile').removeClass('selectedProf');
                    //     $( "#"+profID ).addClass('selectedProf');
                    // }
                    // $( "#appDate").html(dateChoosed);
                    // $( "#appTime").html(timeFrom+"-"+timeTo);

                    //alert("fd");
                  }
            });

            $("#savetime").on('click',function(){
                var getSaveAPI ="";
                var form_data = "";
                $( ".calendar .ui-selected").each(function() {
                    
                    timeFrom = $( this ).attr('timefrom');
                    timeTo = $( this ).attr('timeto');
                    dateChoosed = $( this ).attr('data-dateslot');
                    profID = '<?php echo $_SESSION['id'];?>';
                    getSaveAPI = API_LOCATION+'professional/addBusyTimes.php';
                    //form_data = "{prof_id:'"+profID+"'busy_date:"+dateChoosed+",busy_time:"+timeFrom+'-'+timeTo+"}"
                    //form_data: { field1: "hello", field2 : "hello2"} ,
                    //alert(getSaveAPI);
                    
                    $.ajax({
                            type: "POST",
                            url: getSaveAPI,
                            dataType: "JSON",
                            data: { prof_id: profID, busy_date :dateChoosed, busy_time : timeFrom+'-'+timeTo},
                            success: function(data)
                            {
                                //alert(data['message']);
                                //location.reload();
                            }
                        });
                  //result.append( " #" + ( index + 1 ) );
                });

                alert('Busy time updated successfully');
                location.reload();



            });
            
        });
    </script>
    </body>
    

</html>