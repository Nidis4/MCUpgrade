<?php 
    include('session.php');
    include('header.php'); 
    $currentPage = 'timeline';
    include('menu.php'); 
 ?>
 <?php 
        $t = date('l, F d, Y 00:00:00'); 
        $d = strtotime($t).'000';
        //die;
    ?>
    <style type="text/css">
        td[data-date = "<?php echo $d;?>"] {
            background: #ddd;
        } 
        .weekdays{
            float: right;
            margin-top: 10px;
        }
        .weekdays label {
            background: #ddd;
            padding: 10px;
            border-radius: 20px;
            width: 50px;
            text-align: center;
            cursor: pointer;
        }
        .weekdays label.active 
        {
            background: #d9534f;
            color: #fff;
        }
    </style>
 <link href="css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="../vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
 <link rel="stylesheet" href="../vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
        <div class="col-md-12 page-title" ><h2><!-- Latest Appointments -->τελευταία ραντεβού</h2></div>
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
                                            <p class="appointment-customer-name"><!-- Name -->πελάτης: <span class="custormer-name"><?php echo $appointment_cust_member_name; ?></span></p>
                                            <p class="appointment-address"><!-- Address -->διεύθυνση: <a class="customer-address" target="_blank" href="https://www.google.gr/maps/dir//<?php echo $appointment_address;?>"><?php echo $appointment_address;?></a></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="appointement-budget"><!-- Budget -->προϋπολογισμός: <span class="customer-budget"><?php echo $appointment_budget;?>€</span></p>
                                            <p class="appointement-commission"><!-- Commission -->προμήθεια: <span class="customer-commission"><?php echo $appointment_commision;?>€</span></p>
                                             <p class="appointement-agent-name">Agent Name: <span class="agent-name"><?php echo $appointment_agent_name;?></span></p>
                                            
                                        </div>
                                        <div class="read-more-btn"><!-- Read more -->περισσότερα</div>
                                        <div class="read-more-txt">
                                            <div class="col-md-6">
                                                <p class="appointement-delivery-adress"><!-- Delivery Address -->διεύθυνση παράδοσης: <span class="customer-delivery-adress"></span></p>
                                                <p class="appointement-distance"><!-- Distance -->απόσταση: <span class="customer-distance"></span></p>

                                            </div>
                                            <div class="col-md-6"> 
                                                <a href="tel:<?php echo $appointment_mobile;?>"><div class="call-btn"><i class="fa fa-phone"></i> <?php echo $appointment_mobile;?></div></a>
                                            </div>
                                            <div class="col-md-12">

                                                <p><!-- Comments -->σχόλια: <span class="appointment-comments"><?php echo $appointment_comment;?></span></p>
                                                
                                                 
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
                        //$startDate = "2018-04-01";
                        $endDate = date("Y-m-d",strtotime($startDate ." +5 Days"));
                        
                        $calendar = file_get_contents(SITE_URL.'webservices/api/professional/getCalendar.php?prof_id='.$_SESSION['id'].'&startDate='.$startDate.'&endDate='.$endDate);
                        $calendarlist = json_decode($calendar, true);

                        // echo "<pre>";
                        // print_r(count($calendarlist['calendar']));
                        // die;
                    ?>

                    <div class="row" id="available">
                        <div class="col-md-12 availProf" data-listing-distance="100000">
                            <div class="col-md-12 calendar calendar18273 ui-selectable" style="display: block;">
                                <div class="row">
                                    <?php 
                                        $dates = array();
                                        if(count($calendarlist['calendar'])>=1){
                                            $i = 1;
                                            foreach ($calendarlist['calendar'] as $value) {
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

                                                if($i == count($calendarlist['calendar'])){
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
                    <!-- <div class="row">
                        <div class="col-md-12"><br>
                            <div class="save-btn" id="savetime" >Save</div>
                        </div>
                    </div> -->

                     <div class="row">
                        <div class="col-md-12"><br>
                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                                Add Busy Patterns
                            </button>
                        </div>
                    </div>
                  </div>
                  
              </div>
        </div>
    </div>

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Busy time</h4>
      </div>
      <div class="modal-body">
            <div class="form-group row">
                <label class="col-sm-2 control-label text-sm-right pt-2">Title</label>
                <div class="col-sm-10">
                    
                        <input type="text" name="busytitle" id="busytitle" class="popStart form-control" value="">
                    
                </div>
                 
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label class="col-sm-4 control-label text-sm-right pt-2" style="padding: 0px;">Start Date</label>
                    
                    <div class="col-sm-8" style="padding-right: 0;">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </span>
                             <input type="text" name="startDate" id="startDate" class="popStart form-control" value="<?php echo date("Y-m-d");?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-sm-4 control-label text-sm-right pt-2" style="padding: 0px;">End Date</label>
                    
                    <div class="col-sm-8" style="padding-right: 0;">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </span>
                             <input type="text" name="endDate" id="endDate" class="popStart form-control" value="<?php echo date("Y-m-d",strtotime('+1 day'));?>">
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group row timerow">
                <div class="col-lg-6">
                    <label class="col-sm-4 control-label text-sm-right pt-2" style="padding: 0px;">Start Time</label>
                    
                    <div class="col-sm-8" style="padding-right: 0;">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </span>
                            <input type="text" id="startTime" name="startTime" class="popStart form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="col-sm-4 control-label text-sm-right pt-2" style="padding: 0px;">End Time</label>
                    
                    <div class="col-sm-8" style="padding-right: 0;">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </span>
                            <input type="text" id="endTime" name="endTime" class="popStart form-control" value="">
                        </div>
                    </div>
                </div>

            </div>
              
                

                
            
            
            <div class="form-group row">
                <label class="col-sm-2 control-label text-sm-right pt-2">&nbsp;</label>
                <div class="col-sm-10">
                    <div class="col-lg-1" style="float: left;">
                        <input type="checkbox" class="allday" name="allday">
                    </div>

                    <label class="col-sm-3 control-label text-sm-right pt-2">All Day</label>
                    <?php
                        $d = date('d');
                        $nd = ceil($d/7);
                        if($nd == 1){
                            $tday = "first";
                        }else if($nd == 2){
                            $tday = "second";
                        }else if($nd == 3){
                            $tday = "third";
                        }else if($nd == 4){
                            $tday = "fourth";
                        }else if($nd == 5){
                            $tday = "fifth";
                        }
                    ?>
                    <div class="col-lg-8" style="float: left;">
                        <select name="repeatbusy"  id='repeatbusy' class="form-control">
                            <option value="0">Doesn't repeat</option>
                            <option value="daily">Daily</option>
                            <option value="weeklycustom">Weekly</option>
                            <option value="weekly">Weekly on <?php echo date("l")?></option>
                            <option value="monthly">Monthly on the <?php echo $tday ." ".date("l")?></option>
                            <option value="annually">Annually on the <?php echo date("F d")?></option>
                            <option value="weekday">Every weekday (Monday to Friday)</option>
                        </select>
                    </div>
                    <div class="col-sm-12 weekdays" style="display: none;">
                        <label rel='1'>Mon</label>
                        <label rel='2'>Tue</label>
                        <label rel='3'>Wed</label>
                        <label rel='4'>Thu</label>
                        <label rel='5'>Fri</label>
                        <label rel='6'>Sat</label>
                        <label rel='7'>Sun</label>
                    </div>
                </div>
                
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="updatetime">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <script src="../js/core.js"></script>
    <script src="../vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../vendor/bootstrap-timepicker/bootstrap-timepicker.js"></script>

    <script type="text/javascript">
            $('#startTime').timepicker({
                minuteStep: 30,
                secondStep: 5,
                showInputs: false,
                template: 'dropdown',
                modalBackdrop: true,
                showSeconds: false,
                showMeridian: false
            });
            $("#startDate").datepicker();
            $('#endTime').timepicker({
                minuteStep: 30,
                secondStep: 5,
                showInputs: false,
                template: 'dropdown',
                modalBackdrop: true,
                showSeconds: false,
                showMeridian: false
            });
            $("#endDate").datepicker();
        </script>
    <script type="text/javascript">
        $(document).ready(function(){

            $( ".calendar" ).selectable({
                  filter: ".slot.free",
                  stop: function() {

                    if (confirm('Are you sure want to save?')) {
                        var getSaveAPI ="";
                        var form_data = "";
                        var i = 1;
                        $( ".calendar .free.ui-selected").each(function() {
                            if(i == 1){
                                timeFrom = $( this ).attr('timefrom');
                                timeTo = $( this ).attr('timeto');
                            }else{
                                timeTo = $( this ).attr('timeto');
                            }

                            i += 1;
                            
                            dateChoosed = $( this ).attr('data-dateslot');
                        });

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
                                    alert('Busy time updated successfully');
                                    location.reload();
                                }
                            });
                        return false;
                          //result.append( " #" + ( index + 1 ) );
                        
                    }

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
                $( ".calendar .free.ui-selected").each(function() {
                    
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

            $("#updatetime").on('click',function(){
                    var startDate = $( "#startDate" ).val();
                    var endDate = $( "#endDate" ).val();
                    var startTime = $( "#startTime" ).val();
                    var endTime = $( "#endTime" ).val();
                    var profID = '<?php echo $_SESSION['id'];?>';
                    var repeatbusy = $( "#repeatbusy" ).val();

                    if(startDate > endDate){
                        alert("End date should be greater than or equal to Start date");
                        return false;
                    }


                    if($('.allday').is(':checked')){
                        var allday = 1;
                    }else{
                        var allday = 0;
                        var sdate = startDate +" "+startTime+":00";
                        var edate = endDate +" "+endTime+":00";
                        //var isLarger = new Date("2-11-2012 13:40:00") > new Date("01-11-2012 10:40:00");
                        //alert(sdate);
                        if(Date.parse ( sdate ) > Date.parse ( edate )){
                            alert("End time should be greater than Start time");
                            return false;
                        }
                    }
                    var selctday = "";
                    if($("#repeatbusy").val() == "weeklycustom"){
                       
                        $( "label.active" ).each(function( index ) {
                            selctday += $(this).attr('rel')+",";
                        });

                        if(selctday == ""){
                            alert("Please select any day of the week.");
                            return false;
                        }
                    }

                    //return false;
                    

                    

                    getSaveAPI = API_LOCATION+'professional/addBusyTimes.php';
                    //form_data = "{prof_id:'"+profID+"'busy_date:"+dateChoosed+",busy_time:"+timeFrom+'-'+timeTo+"}"
                    //form_data: { field1: "hello", field2 : "hello2"} ,
                    //alert(getSaveAPI);
                    
                    $.ajax({
                            type: "POST",
                            url: getSaveAPI,
                            dataType: "JSON",
                            data: { prof_id: profID, startDate :startDate, endDate :endDate, startTime :startTime, endTime :endTime, allday :allday,repeatbusy :repeatbusy,selctday:selctday},
                            success: function(data)
                            {
                                alert(data['message']);
                                location.reload();
                            }
                        });
            });


            $('.allday').on('click',function(){
                if($(this).is(':checked')){
                    
                    //$(".popStart").attr('disabled','disabled');
                    //$(".popEnd").attr('disabled','disabled');
                    $('.timerow').css('display','none');
                }else{
                    //$(".popStart").removeAttr('disabled');
                    //$(".popEnd").removeAttr('disabled');
                    $('.timerow').css('display','block');
                }
            });

            $("#repeatbusy").on('change',function(){
                var val = $(this).val();
                if(val == "weeklycustom"){
                    $('.weekdays').css('display','block');
                }else{
                     $('.weekdays').css('display','none');
                }
            });

            $('.weekdays label').on('click',function(){
                $(this).toggleClass('active');
            });


            
        });
    </script>
    </body>
    

</html>