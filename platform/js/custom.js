/* Add here all your JS customizations */
$("#loginForm").submit(function(){
    
    var getLoginAPI = API_LOCATION+'admin/login.php';

    $.ajax({
            type: "POST",
            url: getLoginAPI,
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            dataType: "json",
            success: function(data)
            {
            	var result = data['ResultCode'];
            	//alert(data[0]);
            	//alert (result);
                if (result == '1') {
                	 // Send Ajax request to backend.php, with src set as "img" in the POST data
                	 var user = data['username'];
                	 var name = data['first_name'];
                	 var surname = data['last_name'];
                     var id = data['id'];
                	 var fullname = name+" "+surname;
    				$.post("session.php", {"user": user , "fullname":fullname, "id":id});

                    window.location.replace('../platform/index.php');
                }
                else {
                    alert("Έχετε πληκτρολογήσει λάθος στοιχεία. Παρακαλώ προσπαθήστε ξανά!");
                    location.reload();
                }
            }
        });
    return false;
});

$('select#category').on('change', function() {
    var cat_id = this.value;


    //alert( this.value );
    $('select#applications').prop("disabled", false);
    var getApplicationsAPI = API_LOCATION+'application/readByCategory.php?cat_id='+cat_id;
    //alert(getApplicationsAPI);
    $("#applications").empty();
    $.ajax({
            type: "POST",
            url: getApplicationsAPI,
            dataType: "json",
            success: function(data)
            {
                //alert(data.length);
                 var htmlStr = '';
                 htmlStr += '<option value="" disabled selected>Select your option</option>';
                $.each(data, function(k, v){
                    //htmlStr += v.id + ' ' + v.name + '<br />';
                    //alert(v.id);

                    if (v.id!=undefined){
                        htmlStr += '<option value="'+v.id+'" minp="'+v.min_price+'" dur="60">'+v.title_greek+'</option>';
                    }
                    else{

                    }
               });
               $("#applications").append(htmlStr);
               
            }
        });

    // To get the Questions for the Selected Category
    var getApplicationsQue = API_LOCATION+'application/readByCategoryQue.php?cat_id='+cat_id;
    $.ajax({
            type: "POST",
            url: getApplicationsQue,
            dataType: "html",
            success: function(data)
            {
               $(".application_questions").html(data);
               
            }
        });
});

$('select#applications').on('change', function() {
    var minprice = $('select#applications option:selected').attr('minp');
    var duration = $('select#applications option:selected').attr('dur');

    $('#budget').val(minprice);
    $('#budget').keyup();
    $('#duration').val(duration);
});


$("input#surname").keyup(function () {
    var searchRequest = null;
    var minlength = 3;
    var that = this,
    value = $(this).val();   

    if (value.length >= minlength ) {
        if (searchRequest != null) 
            searchRequest.abort();
            var getSearchAPI = API_LOCATION+'customer/search.php?s='+value;
            searchRequest = $.ajax({
                type: "POST",
                url: getSearchAPI,
                dataType: "json",
                success: function(data){
                    //we need to check if the value is the same
                    var htmlStr = '';
                    $("#suggestions").empty();
                    if (value==$(that).val()) {
                        $.each(data, function(k, v){
                            if (v.id!=undefined){
                                htmlStr += '<div id="'+v.id+'" class="selectCustomer" onclick="selectCustomer('+v.id+',\''+v.first_name+'\',\''+v.last_name+'\',\''+v.address+'\',\''
                                +v.mobile+'\',\''+v.phone+'\',\''+v.email+'\')">'+v.first_name+' '+v.last_name+': '+v.mobile+'</div>';
                            }
                            else{
                                htmlStr += 'No such Customer';
                            }
                       });
                    }
                    $("#suggestions").append(htmlStr);
                    $("#suggestions").show();
                }
            });
        }
        else{
            $("#suggestions").empty();
            $("#suggestions").hide();
        }
    });

$("input#budget").keyup(function () {
    var commision = $('select#category option:selected').attr('comm');
    var comm = $("#budget").val()*commision/100;
    comm = Math.round(comm * 100) / 100;
     $("#commision").val(comm);
});


function selectCustomer(id,first_name,last_name,address, mobile, phone,email){
    $("#suggestions").empty();
    $("#suggestions").hide();
    //alert(id);
    $("#surname").val(last_name);
    $("#firstname").val(first_name);
    //alert(address);
    $("#pac-input-address").val(address);
    $("#mobile").val(mobile);
    $("#phone").val(phone);
    $("#email").val(email);
}


$( document ).ready(function() {
    setNavigation();
});

function setNavigation(){
    var path = window.location.pathname;
    path = path.replace(/\/$/,"");
    path = decodeURIComponent(path);

    $("a.nav-link").each(function () {
        //alert(path);
        var href = '/platform/'+$(this).attr('href');

        if (path.substring(0,href.length) === href){
            $(this).closest('li').addClass('nav-active');
            $(this).closest('.nav-parent').addClass('nav-active nav-expanded');
        }
    })
}

$( ".cancel-row" ).click(function() {
    var id = $(this).closest('tr').attr('data-item-id');
    if (confirm('Are you sure you want to cancel this appointment?')) {
        var getCancelAPI = API_LOCATION+'appointment/cancel.php?id='+id;
            cancelRequest = $.ajax({
                type: "POST",
                url: getCancelAPI,
                dataType: "json",
                success: function(data){
                    var result = data['ResultCode'];
                    if (result=='1'){
                         location.reload();
                    }
                }
            });
    } else {
        // Do nothing!
    }
    
}); // Cancel Appointment 

$( ".copy-row" ).click(function() {
    var id = $(this).closest('tr').attr('data-item-id');
    
    alert("Should be Implemented");
    
});

$('#custSearch .form-group input').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            //alert("Clicked");
            $('#searchCustomer').click();//Trigger search button click event
        }
});

$( "#searchCustomer" ).click(function() {
    //alert("Search Customer");
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var mobile = $("#mobile").val();
    var email = $("#email").val();

    var getAvailableAPI = API_LOCATION+'customer/searchList.php?n='+first_name+'&s='+last_name+'&m='+mobile+'&e='+email;
    //alert(getAvailableAPI);

    $.ajax({
        type: "POST",
        url: getAvailableAPI,
        dataType: "json",
        success: function(data)
        {
            htmlStr = "";
            $("#customers-table").empty();
            $.each(data, function(k, v){
                if (v.id!=undefined){
                    htmlStr += '<tr data-item-id="'+v.id+'"><td>'+v.first_name+' '+v.last_name+'</td><td>'+v.mobile+'</td><td>'+v.email+'</td><td>'+v.sex+'</td><td>'+v.landline+'</td><td>'+v.address+'</td><td class="actions"><a href="customer.php?id='+v.id+'" class="on-default edit-row"><i class="fa fa-pencil"></i></a></td></tr>';
                }
            });
            $("#customers-table").append(htmlStr);
            }
        });
});

$('#profSearch .form-group input').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            //alert("Clicked");
            $('#searchProfessional').click();//Trigger search button click event
        }
});

$( "#searchProfessional" ).click(function() {
    //alert("Search professional");
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var mobile = $("#mobile").val();
    var address = $("#address").val();

    var getAvailableAPI = API_LOCATION+'professional/searchList.php?n='+first_name+'&s='+last_name+'&m='+mobile+'&e='+address;
    //alert(getAvailableAPI);

    $.ajax({
        type: "POST",
        url: getAvailableAPI,
        dataType: "json",
        success: function(data)
        {
            htmlStr = "";
            $("#customers-table").empty();
            $.each(data, function(k, v){
                if (v.id!=undefined){
                    htmlStr += '<tr data-item-id="'+v.id+'"><td>'+v.first_name+' '+v.last_name+'</td><td>'+v.mobile+'</td><td>'+v.landline+'</td><td>'+v.address+'</td><td>'+v.admin_comments+'</td><td class="actions"><a href="professional.php?id='+v.id+'" class="on-default edit-row"><i class="fa fa-pencil"></i></a></td></tr>';
                }    
            });
            $("#customers-table").append(htmlStr);

            }
        });

});

$("input#startDate").change(function(){
    //alert("The text has been changed.");
    var date = new Date($("#startDate").val()); 
    var days = 4;
    //alert(date);
    if(!isNaN(date.getTime())){
        date.setDate(date.getDate() + days);
            
        $("#endDate").val(date.toInputFormat());
    } else {
        alert("Invalid Date");  
    }

});

Date.prototype.toInputFormat = function() {
       var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
    };

$(document).on('click','#available .profile',function() {
    $('.profile').removeClass('selectedProf');
    $('.calendar').css('display','none');
    var prof_id = this.id;
    $( "#"+prof_id ).addClass('selectedProf');
    $('.calendar'+prof_id).css('display','block');
});

$( ".createAppointment" ).click(function() {
    //alert("Create");
    var professional = $('.selectedProf').attr('id');
    //alert(professional);

    var agent = $("#agent").attr('agentUser');
    //alert(agent);
    var application = $("#applications").val();
    var category = $("#category").val();
    var county = $("#county").val();
    var budget = $("#budget").val();
    var commision = $("#commision").val();
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();
    var comments = $("#comment123").val();

    var surname = $("#surname").val();
    var firstname = $("#firstname").val();
    var sex = $("#sex").val();
    var address = $("#pac-input-address").val();
    var mobile = $("#mobile").val();
    var phone = $("#phone").val();
    var email = $("#email").val();

    var date = $("#appDate").html();
    var time = $("#appTime").html();

    if($("#employersms").is(':checked')){
        var employersms = 1;
    }else{
        var employersms = 0;
    }

    if($("#professionalsms").is(':checked')){
        var professionalsms = 1;
    }else{
        var professionalsms = 0;
    }


    // Check if all fields are correct
    if (surname==""){
        alert('Please fill in the Surname');
    }
    else if(firstname==""){
        alert('Please fill in the Name');
    }
    else if(address==""){
        alert('Please fill in the Address');
    }
    else if(mobile==""){
        alert('Please fill in the Mobile');
    }
    else{
        // Find/Insert Customer data
        var findCustomerAPI = API_LOCATION+'customer/search_by_mobile.php?mobile='+mobile;
        $.ajax({
            type: "POST",
            url: findCustomerAPI,
            data: {
                surname: surname,
                firstname: firstname,
                address: address,
                mobile: mobile,
                sex: sex,
                phone: phone,
                email: email,
                date: date,
                time: time
            },
            dataType: "json",
            success: function(data)
            {
                var customer_id = data;
                //var date = "2018-05-05";
                //var time ="10:00-12:00";
                

                var createAppointAPI = API_LOCATION+'appointment/create.php';
                //create($prod_id, $cust_id, $application_id, $date, $time, $address, $budget, $commision, $agent_id, $comment);
                $.ajax({
                    type: "POST",
                    url: createAppointAPI,
                    data: {
                        surname: surname,
                        firstname: firstname,
                        address: address,
                        mobile: mobile,
                        sex: sex,
                        phone: phone,
                        email: email,
                        prof_id : professional,
                        cust_id : customer_id,
                        application_id: application,
                        category_id: category,
                        date: date,
                        time: time,
                        address: address,
                        budget: budget,
                        commision: commision,
                        agent_id: agent,
                        comment: comments,
                        professionalsms: professionalsms,
                        employersms: employersms
                    },
                    dataType: "json",
                    success: function(data)
                    {
                        //alert(data);

                        alert("Appointment Booked");
                        window.location.replace('../platform/appointments.php');
                    }
                });

            }
        });
        return false;

        


        

    }
});

$( ".findProfessionals" ).click(function() {
    var agent = $("#agent").attr('agentUser');
    var application = $("#applications").val();
    var county = $("#county").val();
    var budget = $("#budget").val();
    var commision = $("#commision").val();
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();

    var surname = $("#surname").val();
    var firstname = $("#firstname").val();
    var sex = $("#sex").val();
    var address = $("#pac-input-address").val();
    var mobile = $("#mobile").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    

    //alert("email "+email);
    if (address=="" || application == null || county == "" || startDate == "" || endDate == ""){
        alert("Please check the following fields: Address, Application, County, Start and End Date");
    }
    else{ 
        //alert("County: "+county);
        //alert("Application: "+application);
        //alert("Start: "+startDate);
        //alert("End: "+endDate);
        //alert("Address: "+address);
        var getAvailableAPI = API_LOCATION+'professional/getCalendarForBooking.php?duration='+duration+'&county_id='+county+'&application_id='+application+'&startDate='+startDate+'&endDate='+endDate+'&address='+address;

        $.ajax({
            type: "POST",
            url: getAvailableAPI,
            dataType: "json",
            success: function(data)
            {
                $("#available").empty();
                 var htmlStr = "";
                 var first = 100000;
                 var second= 100000;
                 var third = 100000;
                 var firstProf = "";
                 var secondProf = "";
                 var thirdProf = "";



                $.each(data, function(k, v){

                    var profDistance = v.distance;
                    var profID = v.id;
                    var profName = v.first_name+" "+v.last_name;

                    var dateAvail = startDate;
                    var timeAvail = "09:00";


                    if (v.busy!=undefined){
                        $.each(v.busy, function(z, x){

                            if (x.distance < profDistance){
                                profDistance = x.distance;
                                dateAvail = x.date;
                                timeAvail = x.timeslot;
                            }
                        });
                    } // Busy Slots
                    
                    var calendarCode = "";
                    //alert(v.calendar);
                    if (v.calendar!=undefined){
                        calendarCode += "<div class='row'>";
                        
                        $.each(v.calendar, function(z, x){
                            if (x.timefrom=="09:00"){
                                calendarCode += "<div class='col-md-2'><ul class='selectable' id='selectable-"+profID+"'>";
                            }
                         

                            if (x.address == ""){
                                calendarCode += "<li class='free slot' timefrom='"+x.timefrom+"' timeto='"+x.timeto+"' data-dateslot='"+x.date+"'>"+x.timefrom+":</li>";
                            }
                            else{
                                calendarCode += "<li class='busy slot' timefrom='"+x.timefrom+"' timeto='"+x.timeto+"' data-dateslot='"+x.date+"'>"+x.timefrom+": "+x.address+" "+x.distance+"</li>";
                            }

                            if(x.timeto == "20:00"){
                                calendarCode += "</ul></div>";
                            }

                        });
                        calendarCode += "</div>";
                    } // Calendar Slots
                    if (profDistance=="Unknown"){
                        profDistance=100000;
                    }
                    htmlStr += "<div class='col-md-12 availProf' data-listing-distance='"+profDistance+"'><div class='row'><div class='col-md-12'><div class='profile' id='"+profID+"'><div class='name'>"+profName+"</div><div class='appointDate'>"+dateAvail+" "+timeAvail+"</div><div class='distance'>"+profDistance+"</div> SELECT</div></div></div><div class='col-md-12 calendar calendar"+profID+"'>"+calendarCode+"</div></div>";

                  /*  if (v.distance < third){
                        if (v.distance < second){
                            if (v.distance < first){
                                third = second;
                                second = first;
                                first = v.distance;

                                thirdProf = secondProf;
                                secondProf = firstProf;
                                firstProf = "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='appointDate'>"+startDate+" 09:00</div><div class='distance'>"+v.distance+"</div> SELECT</div>";
                            }
                            else{
                                third = second;
                                second = v.distance;

                                thirdProf = secondProf;
                                secondProf = "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='appointDate'>"+startDate+" 09:00</div><div class='distance'>"+v.distance+"</div> SELECT</div>";
                            }
                        }
                        else{
                            third = v.distance;

                            thirdProf = "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='appointDate'>"+startDate+" 09:00</div><div class='distance'>"+v.distance+"</div> SELECT</div>";
                        }
                    } */

                            //alert(v.first_name+" "+v.last_name+": "+v.distance);
                       
                       /*    htmlStr += "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='distance'>"+v.distance+"</div>";
                             if (v.busy!=undefined){
                                htmlStr += "<div class='busy'>";
                                 $.each(v.busy, function(z, x){
                                    //alert(x.date+" "+x.timeslot);
                                    htmlStr += "<div class='timeslots'>"+x.date+" "+x.timeslot+" στο "+x.address+" - "+x.distance+"</div>";
                                    if (x.distance < third){
                                        if (x.distance < second){
                                            if (x.distance < first){
                                                third = second;
                                                second = first;
                                                first = x.distance;

                                                thirdProf = secondProf;
                                                secondProf = firstProf;
                                                firstProf = "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='appointDate'>"+x.date+" "+x.timeslot+"</div><div class='distance'>"+x.distance+"</div> SELECT</div>";
                                            }
                                            else{
                                                third = second;
                                                second = x.distance;

                                                thirdProf = secondProf;
                                                secondProf = "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='appointDate'>"+x.date+" "+x.timeslot+"</div><div class='distance'>"+x.distance+"</div> SELECT</div>";
                                            }
                                        }
                                        else{
                                            third = x.distance;

                                            thirdProf = "<div class='profile' id='"+v.id+"'><div class='name'>"+v.first_name+" "+v.last_name+"</div><div class='appointDate'>"+x.date+" "+x.timeslot+"</div><div class='distance'>"+x.distance+"</div> SELECT</div>";
                                        }
                                    }
                                 });
                                 htmlStr += "</div>";
                             } // Busy Slots

                             htmlStr += "</div>"; */
                       });
                //$("#available").append(htmlStr);
                $("#available").append(firstProf);
                $("#available").append(secondProf);
                $("#available").append(thirdProf);
                $("#available").append(htmlStr);

                                var divList = $(".availProf");
divList.sort(function(a, b){
    return $(a).data("listing-distance")-$(b).data("listing-distance")
});
$("#available").html(divList);

                $(".available").show();
                $( ".calendar" ).selectable({
                        filter: ".slot.free",
                      stop: function() {
                        var result = $( "#chosen-slot span" ).empty();
                        var timeFrom = "";
                        var timeTo = "";
                        var dateChoosed ="";
                        $( ".ui-selected", this ).each(function() {
                            //alert(this);
                            if (timeFrom==""){
                                timeFrom = $( this ).attr('timefrom');
                            }
                            timeTo = $( this ).attr('timeto');
                            dateChoosed = $( this ).attr('data-dateslot');
                          
                          //result.append( " #" + ( index + 1 ) );
                        });
                        //result.append(dateChoosed+": "+timeFrom+"-"+timeTo);
                        $( "#appDate").html(dateChoosed);
                        $( "#appTime").html(timeFrom+"-"+timeTo);
                      }
                    });
                
                //alert("First Choice "+first);
                //alert("Second Choice "+second);
                //alert("third Choice "+third);
            }
        });

    }
});